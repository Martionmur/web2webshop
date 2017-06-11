<?php
        $db = new newDB();
        $db->doConnect();
        var_dump($_POST);
        
# Bestellung Löschen:
if(!empty($_POST['bedelete'])){
    $db->deleteBestellung($_POST['bedelete']);
}

if(!empty($_POST['produktdelete'])){
    $db->deleteProduktInBestellung($_SESSION['wdetails'] , $_POST['produktdelete']);
    
}

        

# Kunde aktivieren/deaktivieren aus Form zu DB class
if(!empty($_POST['Aktivieren'])){
    $db->activiere_Kunde($_POST['Aktivieren']);
}

if(!empty($_POST['Deaktivieren'])){
    $db->deactiviere_Kunde($_POST['Deaktivieren']);
}
?>

<div class="container"> 
    <div class="col-md-12">
        <h1> Kunden bearbeiten </h1>
        <div>
            <?php 
                $db->printKundenliste();  
            ?>
        </div>    
    </div>
    <div class="col-md-6">
        <h1> Bestellliste </h1>

<?php  
# Bestellliste je Kunde ist hier einsehbar und ganze bestellung zu löschen - Die Buttons mit der Post method wird in printBestellliste angezeigt.
# Zum zwischenspeichern wurde die Session verwendet
if(!empty ($_POST['bdetails'])){
    $_SESSION['bdetails'] = $_POST['bdetails'];
    $_SESSION['wdetails'] = NULL;
}

if(empty($_SESSION['bdetails'])){
    echo 'Keinen Kunden ausgewählt';
} else {
    $db->printBestellListe($_SESSION['bdetails']);
}
            
  ?>
    </div>
    <div class="col-md-6" >
        <h1> Bestelldetails </h1>

<?php
# Jede einzelne Bestellung ist hier einsehbar und einzelne Posten sind löschbar! Um  
if(!empty ($_POST['wdetails'])){
    $_SESSION['wdetails'] = $_POST['wdetails'];
}

if(empty($_SESSION['wdetails'])){
    echo 'Keine Bestellung ausgewählt';
} else {
    $db->printBestellDetails($_SESSION['wdetails']);
    
}
            
  ?>

        
        

    
</div>
    
 




