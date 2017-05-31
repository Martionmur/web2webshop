<?php
include("model/Produkt.class.php");

class newDB {
    private $con = null;
    
    #connection funktioniert
    function doConnect(){
        $this->con = mysqli_connect("localhost","root","","web2webshop");
    }
   
    #query funktioniert
    #->Übergabe der Abfrage per ($query) -> universell einsetzbar zB. abfragen mit Kategorien...
    #Klasse Produktliste weg -> nur ein array von Produkten, ausgabe über db-class
    function giveProduktlist($query){
        $PL = array();
        $res = mysqli_query($this->con, $query);
        $cnt=0;
        while($produkt = mysqli_fetch_object($res)){
            $prod=new Produkt($produkt->pid, $produkt->bezeichnung, $produkt->preis, $produkt->bewertung, $produkt->katbezeichnung, "bildref");
            array_push($PL,$prod);
            $cnt = $cnt+1;
        }
        return $PL;
    }
    
    
    function printProducts($query){
        $res = mysqli_query($this->con, $query);
        echo "<table><ul>";
        while($produkt = mysqli_fetch_object($res)){
            echo "<li>$produkt->pid$produkt->bezeichnung$produkt->preis</li></ul>";					
        }
        echo "</ul></table>";
    }
    
    function printProduktliste($query){
        $res = mysqli_query($this->con, $query);
        
        while($produkt = mysqli_fetch_object($res)){
            $tempProd = new Produkt($produkt->pid, $produkt->bezeichnung, $produkt->preis, $produkt->bewertung, $produkt->katbezeichnung, "bildref");
            echo '  <div class="ProdTile" id="prod'.$tempProd->pid.'" style="width:190px; padding:2px; float:left">'; #draggable through Jquery skript via class?';
            echo '    <div class="thumbnail">';
            echo '      <img src="res/img/prod'.$tempProd->pid.'.jpg".pid alt="'.$tempProd->bezeichnung.'" style="width: 180px; height: 180px;" class="img-thumbnail">';
            echo '      <div class="caption">';
            echo '        <h4>'.$tempProd->bezeichnung.'</h4>';
            echo '        <p>'.number_format($tempProd->preis ,"2",",",".").'€<br>';
            echo '        '.$tempProd->bewertung.'/10 Sternchen</p>';
            echo '        <p><input class="btn btn-default" type="button" value="in Warenkorb legen" onclick=ProduktZuWarenkorb()></p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
        }
            echo '  </div>';
    }
        
    

}

