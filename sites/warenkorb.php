<?php
        echo "<h1>Warenkorb</h1>";
           
            
        
  ?>      
<div class="container">
    <div>
   <?php
   
        $db = new newDB();
        $db->doConnect();
        $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
        $sum = $db->printWarenkorb($query);
        
        $query = 'SELECT `kid`,`anrede`,`vorname`,`nachname`,`adresse`,`plz`,`ort`,`land`,`email` FROM `kunde` WHERE uid ='.SESSION;
        $kid = $db->printKundeninfo($query);
        
        
        
    ?>  
    </div>
    <div>
       <form class="form-horizontal" action="" method="post" name="zahlung" id="zahlung"> 
          <div class="form-group">
            <label for="zahlungsmethode" class="col-sm-4 control-label">Bitte Zahlungsmethode auswählen</label>
            <div class="col-sm-8">
              <select name="formAnrede" class="form-control" id="Anrede">
                <option value="invalid">-</option>
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
          

    
 




