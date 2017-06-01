<?php
include("model/Produkt.class.php");

class newDB {
    private $con = null;
    
    #connection funktioniert
    function doConnect(){
        $this->con = mysqli_connect("localhost","root","","web2webshop");
        #add UTF-8 mode!
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
        
    function countUserCheck($regUsername){
        $query = "SELECT * FROM `user` WHERE `username` = '".$regUsername."';";		
	//echo $query;
        $res = mysqli_query($this->con, $query); 
        
        if(mysqli_num_rows($res) > 0) return true;
        else return false;
    }
    
    function insertUser($regUsername, $regPasswort){
        ## User einfügen
		$query = "INSERT INTO `web2webshop`.`user` ( `username`, `passwort`) VALUES ('".$regUsername."', '".$regPasswort."');";		
		//echo $query;
		$res = mysqli_query($this->con, $query);		
		
		if($res){
			return true;
		}else{
			return false;	
		}
    }
    
    function getUserID($regUsername){
        ## UserID von usernamen bekommen
		$query = "SELECT `uid` FROM `user` WHERE `username` = '".$regUsername."'";		
		
                $res = mysqli_query($this->con, $query);		
                while($x = mysqli_fetch_object($res)){
                $uid=$x->uid;
                }
                return $uid;
    }

    function getKundenID($uid){
        ## KundenID von userID bekommen
		$query = "SELECT `kid` FROM `kunde` WHERE `uid` = '".$uid."'";		
		
                $res = mysqli_query($this->con, $query);		
                while($x = mysqli_fetch_object($res)){
                $kid=$x->kid;
                }
                return $kid;
    }        
    
    function insertKunde($regUID, $regAnrede, $regVorname, $regNachname, $regAdresse, $regPLZ, $regOrt, $land, $regEmail){
		$query = "INSERT INTO `web2webshop`.`kunde` ( `uid`, `anrede`, `vorname`, `nachname`, `adresse`, `plz`, `ort`, `land`, `email`) "
                        . "VALUES ('".$regUID."', '".$regAnrede."', '".$regVorname."', '".$regNachname."', '".$regAdresse."', '".$regPLZ."', '".$regOrt."', '".$land."', '".$regEmail."');";		
		$res = mysqli_query($this->con, $query);		
		
		if($res){
			return true;
		}else{
			return false;	
		}        
    }
    
    function insertZahlungsinfo($kid, $zahlungsart, $zahlungsdetails){
        $query = "INSERT INTO `web2webshop`.`zahlungsinfo` (`kid`,`art`, `nummer`) VALUES ('".$kid."', '".$zahlungsart."', '".$zahlungsdetails."');";
        $res = mysqli_query($this->con, $query);
        
        	if($res){
			return true;
		}else{
			return false;	
		} 
        
    }
                
               
 

#ENDE
}
    



