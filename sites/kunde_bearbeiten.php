<?php
        echo "<h1> Kunden bearbeiten </h1>";
        #$db = new mysqli('localhost','root', '', 'web2webshop');
        $db = new newDB();
        $db->doConnect();
        $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
        $db->printProduktliste($query);
        #var_dump($Produktliste);
        

        
        #$ProdukteKonkret = $db->getProduktListe();
        #var_dump($ProdukteKonkret);
        #$ProdukteKonkret.fillProduktliste();
        #produktListenAnzeige($ProdukteKonkret.fillProduktliste())
        #$ProdukteKonkret->produktListenAnzeige();
            
            
        
  ?>  
       
    
 




