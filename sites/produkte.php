<?php
        include("model/Produktliste.class.php");
        $db = new DB();
        $db->doConnect();
        #$ProdukteKonkret = new ProduktListe(); ### Ich blick nicht mehr durch ob ich das brauch       
        #$ProdukteKonkret = $db->getProduktListe();
        #$ProdukteKonkret.fillProduktliste();
        #produktListenAnzeige($ProdukteKonkret)
            
            
        
  ?>      
<!-- DRAGGABLE IN HEAD -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>jQuery UI Draggable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( ".ProdTile" ).draggable(); 
  } );
  </script>
 <!-- right kind of dragable?-->
</head>
<body>
    
   <?php
        $db = new DB();
        $db->doConnect();
        $ProdukteKonkret = new ProduktListe(); ### Ich blick nicht mehr durch ob ich das brauch       
        $ProdukteKonkret = $db->getProduktListe();
        #$ProdukteKonkret.fillProduktliste();
        #produktListenAnzeige($ProdukteKonkret.fillProduktliste())
        $ProdukteKonkret.produktListenAnzeige();
            
            
        
  ?>  
    
</body>
    
    
 




