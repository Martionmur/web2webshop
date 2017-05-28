<?php
include("Produkt.class.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produktliste
 *
 * @author Martin M
 */
class Produktliste {
    
    public $PL = array(); 
    
    function fillProduktliste($row){ 
                        $prod.$row['pid'] = new Produkt($row['pid'],$row['bezeichnung'],$row['preis'],$row['bewertung'],$row['katbezeichnung'],$row['bildref']); ## der objektname soll sich aus prod und pid zusammensetzen @Matthias: wird hier überhaupt eine Variable deklariert?
                        #$prod.$row['pid']->pid = $row['pid'];
                        #$prod.$row['pid']->bezeichnung = $row['bezeichnung'];
                        #$prod.$row['pid']->preis = $row['preis'];
                        #$prod.$row['pid']->bewertung = $row['bewertung'];
                        #$prod.$row['pid']->kategorie = $row['katbezeichnung'];
                        #$prod.$row['pid']->bildref = $row['bildref']; ## oder Bildref errechnen aus pid
                        
                        array_push($this->PL, prod.$row['pid']);       ## Now Put into Array
                    
                
                #return $ProduktListe; #### notwendig??? @Matthias: glaube nicht, weil array_push($this->PL...) schon die Einträge speichert
    }
                
    function produktListenAnzeige(){
        
            echo '<div id="ProduktListenAnzeige">';

        foreach ($this->PL as $Produkt){ 
            ## Row management oder Kategorien hier. Css wäre hilfreich hier. dragable ändern.
            echo '  <div class="ProdTile" id="prod'.$Produkt->pid.'" style="width:190px; padding:2px; float:left">'; #draggable through Jquery skript via class?';
            echo '    <div class="thumbnail">';
            echo '      <img src="res/img/prod'.$Produkt->pid.'.jpg".pid alt="'.$Produkt->bezeichnung.'" style="width: 180px; height: 180px;" class="img-thumbnail">';
            echo '      <div class="caption">';
            echo '        <h4>'.$Produkt->bezeichnung.'</h4>';
            echo '        <p>'.number_format($Produkt->preis ,"2",",",".").'€<br>';
            echo '        '.$Produkt->bewertung.'/10 Sternchen</p>';
            echo '        <p><input class="btn btn-default" type="button" value="in Warenkorb legen" onclick=ProduktZuWarenkorb()></p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
        }
            echo '  </div>';
            
                    
    }
    //put your code here
}
