<div class="container">

    <?php
    $db = new newDB();
    $db->doConnect(); 

    $db->printKundeninfo($_SESSION['user']->uid);        
    $abrechnung = $db->getRechnunginfos($_POST['rechnung']);  

    echo '<h1>Rechnung </h1>';
    echo 'Rechnungsnummer: '. $db->makeRechnungsnummer($_POST['rechnung'])."<br>";
    echo 'Bestellnummer: '. $_POST['rechnung'];
    echo '<p> Bestellt am '. $abrechnung->datum;

    #rechnungstabelle:
    $sum = $db->printBestellDetails($_POST['rechnung']);

    #Abrechnungsdetails
    echo"<p>  Zwischensumme: ".   number_format($sum,"2",",",".") ."€ </p>"
    . "<p>    Gutschrift: ".      number_format($abrechnung->gutscheinentwertung ,"2",",",".") . "€ </p>"
    . "<p><b> Rechnungsbetrag: ". number_format($sum-$abrechnung->gutscheinentwertung,"2",",",".") . "€ </b></p>"
    . "<p> Bezahlt mit ".$abrechnung->art."</p>";

    ?>

</div>    



