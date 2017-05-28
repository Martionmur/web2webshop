<?php
include("model/Produktliste.class.php");

class DB {
    private $con = null;
    
    #passt
    function doConnect(){
		$this->con = mysqli_connect("localhost","root","","web2webshop"); 		
    }
    
    #gibt zurück, wie viele user des aufgerufenen namen existieren
    function countUserCheck($regUsername){
                $query = "SELECT `count(username)` FROM `user` WHERE `username` = '".$regUsername."';";		
		//echo $query;
		$uidCount = mysqli_query($this->con, $query);
                
                return $uidCount;
    }
    
    #legt neuen User in DB an
    function insertUser($regUsername, $regPasswort){
        ## count User on Usermail
                if (countUserCheck($regUsername)!= 0) {
                    echo "<script type='text/javascript'>alert('Username bereits vergeben')</script>";
                }
        ## User einfügen
		$query = "INSERT INTO `web2webshop`.`user` ( `username`, `passwort`) VALUES (".$regUsername."', '".$regPasswort."');";		
		//echo $query;
		$res = mysqli_query($this->con, $query);		
		
		if($res){
			return "user angelegt";
		}else{
			return "fehler beim User anlegen: ".$query;	
		}
    }
    
    #gibt User_ID zurück
    function getUserID($regUsername){
        ## UserID von usernamen bekommen
		$query = "SELECT `uid` FROM `user` WHERE `username` = '".$regUsername."');";		
		//echo $query;
		$uid = mysqli_query($this->con, $query);		
		
		if($uid){
			return $uid;
		}else{
			return "fehler beim Userid suchen: ".$query;	
		}    
    }
    
    #legt Kunden in DB an -> return string sinnvoll? -> wie einbinden?
    function insertKunde($regUID, $regAnrede, $regVorname, $regNachname, $regAdresse, $regPLZ, $regOrt, $regEmail){
        ## Kunde einfügen
		$query = "INSERT INTO `web2webshop`.`kunde` ( ´uid´, ´anrede´, ´vorname´, ´nachname´, ´adresse, ´plz´, ´ort´, ´email´) "
                        . "VALUES ('".$regUID."', '".$regAnrede."', '".$regVorname."', '".$regNachname."', '".$regAdresse."', '".$regPLZ."', '".$regOrt."', '".$regEmail."');";		
		//echo $query;
		$res = mysqli_query($this->con, $query);		
		
		if($res){
			return "user angelegt";
		}else{
			return "fehler beim Kunden anlegen: ".$query;	
		}
    }
    
    #gibt Kundenid zurück 
    function getKundenID($regUID){
        ## KundenID von UserID bekommen
		$query = "SELECT `kid` FROM `kunde` WHERE `uid` = '".$regUID."');";		
		//echo $query;
		$kid = mysqli_query($this->con, $query);		
		
		if($kid){
			return $kid;
		}else{
			return "fehler beim Kundenid suchen: ".$query;	
		}    
    }
   
    #legt Zahlungsinfo in DB an
    function insertZahlungsinfo($regKID, $regArt, $regNummer){
		$query = "INSERT INTO `web2webshop`.`zahlungsinfo` (`kid`, `art`, `nummer`) VALUES ('".$regKID."', '".$regArt."', '".$regNummer."');";		
		//echo $query;
		$res = mysqli_query($this->con, $query);		
		
		if($res){
			return "Zahlungsinfo angelegt";
		
		}else{
			return "fehler beim Zahlungsinfo anlegen: ".$query;
			
		}
	
    }
    
    #md5 verschlüsselung? wie?
    function checkPW($logUsername, $logPW){
        ## KundenID von UserID bekommen
		$query = "SELECT `passwort` FROM `user` WHERE `username` = '".$logUsername."');";		
		//echo $query;
		$stored = mysqli_query($this->con, $query);		
		
		if($stored == md5($logPW)){
			return TRUE;
		}else{
			return "fehler beim Passwort vergleichen: ".$query;	
		}    
    }
    
    #instanziert ein Objekt der Klasse "user" -> daten gleich hier in Session speichern?
    function makeUser($logUsername, $logPW){
        ## User mit passwort bauen - könnte die Funktion auch separat aufgerufen werden
		$query = "SELECT `uid`, `username`, `rolle` FROM `user` WHERE `username` = '".$logUsername."' AND `passwort` = '".$logPW."');";		
		//echo $query;
		$result = mysqli_query($this->con, $query);		
		
		if(isset($result)){
			$user = new User();
                        $user->uid = $result['uid'];
                        $user->username = $result['username'];
                        $user->rolle = $result['rolle'];
                        return $user;
		}else{
			return "fehler bei Userdaten holen: ".$query;	
		}
    }

    
    function getProduktListe(){
        $query = "SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung`, `bildref` FROM `produkte` JOIN `kategorie` using(`katid`) ORDER BY `bezeichnung`);";		
	//echo $query;
	$result = mysqli_query($this->con, $query);		
		
	if(isset($result)){
            $Produktliste = new Produktliste();
            
            while($row = $result->fetch_object()){
            $Produktliste->fillProduktliste($row); ################## Wohin füllte den die Liste jetzt genau?  @Matthias: fillProduktliste($result) funktioniert nicht, weil $result=boolean -> fillProduktliste(true), deswegen wird jede row in einer schleife übergeben       
            ##sehe hier den Knackpunkt, warum es nicht funktioniert - bin auch nicht sicher, ob das übergeben der Werte richtig ist. 
            }
        return $ProduktListe;
        }
         ##über das $this in fillProduktliste braucht ma das ja oder nein?
        else{
                echo ("<script type='text/javascript'>;alert('Username bereits vergeben';");
                echo ("</script>");
                # alert "fehler bei Produktliste nach Kat aus DB holen: ".$query;	
	}
    }
    
    function getProduktListeByKat($prodKat){
        ## User mit passwort bauen - könnte die Funktion auch separat aufgerufen werden
		$query = "SELECT `pid`, `bezeichnung`, `preis`, `bewertung`, `katbezeichnung`, `bildref` FROM `produkte` JOIN `kategorie` using(`katid`) WHERE `kategorie` = '".$prodKat."' ORDER BY `bezeichnung`);";		
		//echo $query;
		$result = mysqli_query($this->con, $query);		
		
		if(isset($result)){
                    
                    $Produktliste = new Produktliste();
                    $Produktliste->fillProduktliste($result); ################## Wohin füllte den die Liste jetzt genau? @Matthias: fillProduktliste funktioniert nicht, weil $result=boolean -> fillProduktliste(true)        
                    ##                  
                                   
                 return $ProduktListe; ##über das $this in fillProduktliste braucht ma das ja oder nein?

		}else{
			return "fehler bei Produktliste nach Kat aus DB holen: ".$query;	
		}
    }
    
    ##    function getProduktListeByLIKE($search){
    ##    function getProduktListeByPIDs($warenkorb){
}
