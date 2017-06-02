<?php

        $db = new newDB();
        $db->doConnect(); 
        
        
  ?>      

<div class="container">
    <div>
        <h1>Warenkorb</h1>
        <div id= 'kundeninfo' class='col-md-6' style= 'float'>  

            <?php        
                 # echo var_dump($_SESSION['user']);
                 if ($_SESSION['user']->rolle == 'kunde'){
                     echo "<p><b>Lieferadresse</p></b>";
                     $query2 = 'SELECT `kid`,`anrede`,`vorname`,`nachname`,`adresse`,`plz`,`ort`,`land`,`email` FROM `kunde` WHERE uid ='.$_SESSION['user']->uid;
                     $kid = $db->printKundeninfo($query2);

                     #echo $kid;
                     echo "<input type=button href='index.php?tab=meinkonto.php' value='Kundendaten ändern'> ";
                 } else {
                     echo "<p>Bitte regestrieren Sie sich um mit der Bestellung fortzufahren.</p>"
                         ."<form action='' method='get'>"
                             . "<input type=submit name='tab' value='register'>als Kunde registrieren</input> "
                         ."</form>";   
                 } 
             ?> 
        </div>
        <div id= 'warenkorb' class='col-md-6'>    
            <?php
                 $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
                 $sum = $db->printWarenkorb($query);
            ?>
        </div>
        
    </div>
    <div id="Gutscheinzahlung" class="col-md-12">
        <div id="Gutschein" class="col-md-6">
        
            <?php
            if(!empty($_POST)) {
                # echo var_dump($_POST);
                if(isset($_POST['gutscheincode'])    || !$_POST['gutscheincode'] == ""){

                    $query4 = 'SELECT `gid`, `code`, ablaufdatum-current_date() AS `ablaufwert`, `wert`, `valid` FROM `gutschein` where `code`="'.$_POST['gutscheincode'].'"';
                    $gutschein = $db->getGutschein($query4, $_POST['gutscheincode']);
                    if ($gutschein->gid != -1){
                        echo "Der Gutschein ist gültig (EUR" . $gutschein->wert. ")";
                    }
                }
            } else {
            echo '<form class="form-horizontal" action="" method="post" name="gutschein" id="zahlung"> 
                    <div class="form-group">
                      <label for="gutschein" class="col-sm-4 control-label">Gutscheincode</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="gutschein" name="gutscheincode" pattern="[A-Za-z0-9]{5}" title="Der Code ist fünf Zeichenlang und besteht aus Buchstaben und Zahlen.">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-default"  value="">Gutschein prüfen</button>
                      </div>
                    </div>
                 </form>';
                }

            ?>   
        </div>
        <div id="rechnungsbetrag" class="col-md-6">
            <?php
            $gesamt;
            $restguthaben=0;
            if (isset($gutschein)) {
                $gesamt = $sum-$gutschein->wert;
                if($gesamt < 0){
                    $gesamt = 0;
                    $restguthaben = -$sum+$gutschein->wert;
                }
            
                echo"<p>  Zwischensumme: ".   number_format($sum,"2",",",".") ."€ </p>"
                . "<p>    Gutschrift: ".      number_format(-$gutschein->wert,"2",",",".") . "€ </p>"
                . "<p><b> Rechnungsbetrag: ". number_format($gesamt,"2",",",".") . "€ </b></p>";
                if($restguthaben != 0) {
                    echo "<p> Restguthaben: ". $restguthaben . "€</p>";
                }
                
            } else {
                $gesamt = $sum;
                echo "<p><b> Rechnungsbetrag: ". number_format($gesamt,"2",",",".") . "€ </b></p>";                
            }    
            ?>    
        </div>
    </div>
    <?php
    if(!empty($_POST)){
        # echo var_dump($_POST);
            if(!isset($_POST['gutscheincode'])    || $_POST['gutscheincode'] == ""){
                         } else {
                $query4 = 'SELECT `gid`, `code`, ablaufdatum-current_date() AS `ablaufwert`, `wert`, `valid` FROM `gutschein` where `code`="'.$_POST['gutscheincode'].'"';
                $gutschein = $db->getGutschein($query4, $_POST['gutscheincode']);
            }
            # echo var_dump($gutschein);
    }  
    ?>      


    <div id="Zahlung" class="col-md-6">
       <form class="form-horizontal" action="" method="post" name="zahlung" id="zahlung"> 
          <div class="form-group">
            <label for="zahlungsmethode" class="col-sm-4 control-label">Bitte Zahlungsmethode auswählen</label>
            <div class="col-sm-8">
              <select name="formAnrede" class="form-control" id="Anrede">
                <option value="invalid">-</option>
           <?php
           $query3 = 'SELECT `art`,`nummer` FROM `zahlungsinfo` WHERE `kid`='.$kid; 
            $db->printZahlungsOption($query3);
           ?>
        <!--    <option value="Herr">Herr </option> FOREACH ZAHLUNGSMETHODE DES KUNDEN
                <option value="Frau">Frau </option> -->
              </select>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default" name="fromSubmit" value="Zahlung">Zahlung bestätigen</button>
            </div>
          </div>
       </form>
    </div>
  </div>
          

    
 




