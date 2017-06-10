<?php
        #include("utility/newDB.class.php");
        #include("model/Produktliste.class.php");
        #$ProdukteKonkret = new ProduktListe(); ### Ich blick nicht mehr durch ob ich das brauch       
        #$ProdukteKonkret = $db->getProduktListe();
        #$ProdukteKonkret.fillProduktliste();
        #produktListenAnzeige($ProdukteKonkret)
            
            
        
  ?>          
   <?php
        #$db = new mysqli('localhost','root', '', 'web2webshop');
        $db = new newDB();
        $db->doConnect();
        $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
        $db->printProduktliste($query);
        

        
        #$ProdukteKonkret = $db->getProduktListe();
        #var_dump($ProdukteKonkret);
        #$ProdukteKonkret.fillProduktliste();
        #produktListenAnzeige($ProdukteKonkret.fillProduktliste())
        #$ProdukteKonkret->produktListenAnzeige();
            
            
        
  ?>  
       
    
 




