<?php
        $db = new newDB();
        $db->doConnect();
  ?>  
       
    
 
<div class="container"> 
    <h1> Mein Konto </h1>
    <div class="col-md-6" style="height:100">
        <h1> Bestellliste </h1>

<?php  
# Bestellliste anzeigen
    $db->printBestellListe($_SESSION['user']->uid);
            
  ?>
    </div>
    <div class="col-md-6" style="height:100">
        <h1> Bestelldetails </h1>

<?php    

if(empty($_POST['wdetails'])){
    echo 'Keine Bestellung ausgewählt';
} else {
    $db->printBestellDetails($_POST['wdetails']);
    
}
            
  ?>

        
        

    
</div>





