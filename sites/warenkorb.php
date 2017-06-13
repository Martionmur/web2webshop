<?php

$db = new newDB();
$db->doConnect(); 
           
?>      

<div class="container">
    <div>
        <h1>Warenkorb</h1>
        <div id= 'kundeninfo' class='col-md-6'>  

            <?php
# Kundeninfo prüfen  und Optionen anzeigen
                 # echo var_dump($_SESSION['user']);
                 if ($_SESSION['user']->rolle == 'kunde'){
                     echo "<p><b>Lieferadresse</p></b>";
                     $kid = $db->printKundeninfo($_SESSION['user']->uid);

                     $_SESSION['kid']= $kid;
                    echo "<form action='' method='get'>"
                             . "Kundendaten ändern: "
                             . "<input type=submit name='tab' value='meinkonto'></input> "
                          . "</form>";

                 } else {
                     echo "<p>Bitte registrieren Sie sich um mit der Bestellung fortzufahren.</p>"
                         ."<form action='' method='get'>"
                             . "<input type=submit name='tab' value='login'></input> "
                             . "<input type=submit name='tab' value='register'></input> "
                         ."</form>";   
                 } 
             ?> 
        </div>
        <div id= 'warenkorb' class='col-md-6' style= 'float'>    
            <?php
#warenkorb anzeigen und Summe in Session Speichern 
                 $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
                 $_SESSION['sum'] = $db->printWarenkorb($query);
            ?>
        </div>
        
    </div>
    <div id="Gutscheinzahlung" class="col-md-12">
        <div id="Gutschein" class="col-md-6">
        
            <?php
#Gutschein eingabe prüfen und ergebnis anzeigen
            if(!empty($_POST['gutscheincode'])) {
                    $gutschein = $db->getGutschein($_POST['gutscheincode']);
                    #var_dump($gutschein);
                    if ($gutschein->gid > 0){
                        $_SESSION['gutschein'] = $gutschein;                        
                    } elseif ($gutschein->gid == -1) {
                        echo "<script type='text/javascript'>alert('Der Gutscheincode ist nicht gültig.')</script>";
                    } elseif ($gutschein->gid == -2) {
                        echo "<script type='text/javascript'>alert('Der Gutschein ist nicht mehr gültig.')</script>";
        
    }
            }
            
            if (!empty($_SESSION['gutschein'])){
                echo "Der Gutschein ist gültig (EUR" . $_SESSION['gutschein']->wert. ")";
            } else {
            echo '<form class="form-horizontal" action="" method="post" name="gutschein" id="gutschein"> 
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
        <div id="rechnungsbetrag" class="col-md-6" style= 'float'>
            <?php
# Abrechnen (Summe, Gutschein, Restbetrag, ect.)
            $gesamt;
            $restguthaben=0;
            $sum = $_SESSION['sum'];
            if (isset($_SESSION['gutschein'])) {
                $gesamt = $sum - $_SESSION['gutschein']->wert;
                if($gesamt < 0){
                    $gesamt = 0;
                    $restguthaben = $_SESSION['gutschein']->wert - $sum;
                }
            
                echo"<p>  Zwischensumme: ".   number_format($sum,"2",",",".") ."€ </p>"
                . "<p>    Gutschrift: ".      number_format(-$_SESSION['gutschein']->wert,"2",",",".") . "€ </p>"
                . "<p><b> Rechnungsbetrag: ". number_format($gesamt,"2",",",".") . "€ </b></p>";
                if($restguthaben != 0) {
                    echo "<p> Restgutschrift: ".number_format($restguthaben,"2",",",".") . "€</p>";
                }
                
            } else {
                $gesamt = $sum;
                echo "<p><b> Rechnungsbetrag: ". number_format($gesamt,"2",",",".") . "€ </b></p>";                
            } 
            
            $_SESSION['gesamt'] = $gesamt;
            $_SESSION['restguthaben'] = $restguthaben;
            
            ?>    
        </div>
    </div>

<!-- Zahlungsmethode auswählen und Bestellung abschicken - die Bestellung wird in Logchange.inc verarbeitet.-->
    <div id="Zahlung" class="col-md-12">
       <form class="form-horizontal" action="" method="post" name="zahlung" id="zahlung"> 
          <div class="form-group" class="col-md-6">
            <label for="zahlungsmethode" class="col-sm-4 control-label">Bitte Zahlungsmethode auswählen</label>
            <div class="col-sm-8">
              <select name="zahlung" class="form-control" id="zahlungsinfo">
                <option value="invalid">-</option>
           <?php
           $query3 = 'SELECT `zid`,`art`,`nummer` FROM `zahlungsinfo` WHERE `kid`='.$kid; 
            $db->printZahlungsOption($query3);
           ?>

              </select>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-default" name="zahlungSubmit" value="Zahlung">Zahlung bestätigen</button>
            </div>
          </div>
       </form>
    </div>
  </div>
    
          
<?php

//           var_dump($_SESSION['user']);
//           $testUser = new User;
//           $testUser= $_COOKIE['user'];
//           var_dump($_COOKIE);

           
        

        
        
        
    #echo "<br> Bestellung :". var_dump($_POST['zahlung']);    
    #echo "<br> Gutschein :". var_dump($_SESSION['gutschein']->gid);

        
        
        

    
 




