<?php
        $db = new DB();
        $db->doConnect();
        $ProdukteKonkret = new ProduktListe(); ### Ich blick nicht mehr durch ob ich das brauch       
        $ProdukteKonkret = $db->getProduktListe();
        
        foreach ($ProdukteKonkret ->PL as $Produkt){ 
        }
        
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
    $( "#draggable" ).draggable();
  } );
  </script>
</head>
<body>
 
<div id="draggable" class="ui-widget-content">
  <p>Drag me around</p>
</div>



## produktliste mit caption carten
<div class="row">
  <div class="ProdTile" id="ProdTile.Pid"> #draggable
    <div class="thumbnail">
      <img src="res/img/prod1".pid alt=Bezeichnung>
      <div class="caption">
        <h4>Bezeichnung</h4>
        <p>Preis." €"</p>
        <p>Bewertung."/10 Bewertung"</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>