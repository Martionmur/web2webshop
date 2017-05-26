<?php

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
    
    function fillProduktliste($result){ 
                      
                    foreach ($result as $row){ 
			
                        prod.$row['pid'] = new Produkt(); ## der objektname soll sich aus prod und pid zusammensetzen
                        prod.$row['pid']->pid = $row['pid'];
                        prod.$row['pid']->bezeichnung = $row['bezeichnung'];
                        prod.$row['pid']->preis = $row['preis'];
                        prod.$row['pid']->bewertung = $row['bewertung'];
                        prod.$row['pid']->kategorie = $row['katbezeichnung'];
                        prod.$row['pid']->bildref = $row['bildref']; ## oder Bildref errechnen aus pid
                        
                        array_push($this->PL, prod.$row['pid']);       ## Now Put into Array
                    }  
                
                return $ProduktListe; #### notwendig???
    }
    //put your code here
}
