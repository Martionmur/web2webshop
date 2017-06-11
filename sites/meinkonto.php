<?php
        echo "<h1> Mein Konto </h1>";  

        #$db = new mysqli('localhost','root', '', 'web2webshop');
        $db = new newDB();
        $db->doConnect();
        $db->printBestellListe($_SESSION['user']->uid);
        

        
  ?>  
       
    
 




