         
   <?php
        $db = new newDB();
        $db->doConnect();
        $query = 'SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`';		
        $db->printProduktliste_admin($query);
          
        
  ?>  
       
    
 




