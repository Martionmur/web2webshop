<?php
        echo "<h1> Gutschein verwalten</h1>";


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
       
    
 




