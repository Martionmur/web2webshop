<?php
        echo "<h1>Warenkorb</h1>";
           
            
        
  ?>      
<div class="container">
    
   <?php
   
        $db = new newDB();
        $db->doConnect();
        echo "<div>"
        . "<div>";
        $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
        $sum = $db->printWarenkorb($query);
        
        echo "</div> <div style= 'float'>";  
        echo var_dump($_SESSION['user']);
        if ($_SESSION['user']->rolle == 'kunde'){
        
            $query2 = 'SELECT `kid`,`anrede`,`vorname`,`nachname`,`adresse`,`plz`,`ort`,`land`,`email` FROM `kunde` WHERE uid ='.$_SESSION['user']->uid;
            $kid = $db->printKundeninfo($query2);
            
            echo $kid;
            echo "<input type=button href='index.php?tab=meinkonto.php' value='Kundendaten ändern'> ";
        } else {
            echo "<p>Bitte regestrieren Sie sich um mit der Bestellung fortzufahren.</p>"
                ."<input type=button href='index.php?tab=register.php' value='Als Kunde Registrieren'> ";
        } 
        echo '</div>';
        
    ?>  
    </div>
    <div>
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
            <label for="gutschein" class="col-sm-4 control-label">Gutscheincode</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="gutschein" name="gutscheincode" pattern="[A-Za-z0-9]{5}" title="Der Code ist fünf Zeichenlang und besteht aus Buchstaben und Zahlen.">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default" name="fromSubmit" value="Zahlung">Gutschein prüfen und Zahlung bestätigen</button>
            </div>
          </div>
       </form>
    </div>
          

    
 




