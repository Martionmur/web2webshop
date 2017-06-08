<?php
#include("model/Produkt.class.php");
#include("model/User.class.php");

class newDB {
    private $con = null;
    
    #connection funktioniert
    function doConnect(){
        $this->con = mysqli_connect("localhost","root","","web2webshop");
        $this->con->set_charset('UTF-8');
        #add UTF-8 mode!
    }
   
    #query funktioniert
    #->Übergabe der Abfrage per ($query) -> universell einsetzbar zB. abfragen mit Kategorien...
    #Klasse Produktliste weg -> nur ein array von Produkten, ausgabe über db-class

#PRODUKTE
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
            echo '    <div class="thumbnail ui-widget-content">';
            echo '      <img src="res/img/prod'.$tempProd->pid.'.jpg".pid alt="'.$tempProd->bezeichnung.'" style="width: 180px; height: 180px;" class="img-thumbnail">';
            echo '      <div class="caption">';
            echo '        <h4>'.$tempProd->bezeichnung.'</h4>';
            echo '        <p>'.number_format($tempProd->preis ,"2",",",".").'€<br>';
            echo '        '.$tempProd->bewertung.'/10 Sternchen</p>';
            echo '        <p><input class="btn btn-default" type="button" value="in Warenkorb legen" onclick="ProduktZuWarenkorb('.$tempProd->pid.')"></p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
        }
            echo '  </div>';
    }
     function printProduktliste_admin($query){
        $res = mysqli_query($this->con, $query);
            echo '  <div class="ProdTile" id="newprod" style="width:190px; padding:2px; float:left">'; #draggable through Jquery skript via class?';
            echo '    <div class="thumbnail ui-widget-content">';
            echo '      <img src="res/img/newprod.jpg".pid alt="NEUES PRODUKT" style="width: 180px; height: 180px;" class="img-thumbnail">';
            echo '      <div class="caption">';
            echo '        <h4>neues Produkt</h4>';
            echo '        <p><br>';
            echo '        ?/10 Sternchen</p>';
            echo '        <p><input class="btn btn-default" type="button" value="Produkt erstellen" onclick="????????"></p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
        
        while($produkt = mysqli_fetch_object($res)){
            $tempProd = new Produkt($produkt->pid, $produkt->bezeichnung, $produkt->preis, $produkt->bewertung, $produkt->katbezeichnung, "bildref");
            echo '  <div class="ProdTile" id="prod'.$tempProd->pid.'" style="width:190px; padding:2px; float:left">'; #draggable through Jquery skript via class?';
            echo '    <div class="thumbnail ui-widget-content">';
            echo '      <img src="res/img/prod'.$tempProd->pid.'.jpg".pid alt="'.$tempProd->bezeichnung.'" style="width: 180px; height: 180px;" class="img-thumbnail">';
            echo '      <div class="caption">';
            echo '        <h4>'.$tempProd->bezeichnung.'</h4>';
            echo '        <p>'.number_format($tempProd->preis ,"2",",",".").'€<br>';
            echo '        '.$tempProd->bewertung.'/10 Sternchen</p>';
            echo '        <p> <input class="btn btn-default" type="button" value="Details" onclick="????????('.$tempProd->pid.')">'
                           . '<input class="btn btn-default" type="button" value="Delete" onclick="????????('.$tempProd->pid.')"></p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
        }
            echo '  </div>';
    }
  
  
    
#WARENKORB   
    function printWarenkorb($query){
        $res = mysqli_query($this->con, $query);        
        $sum = 0.00;
        
        echo "<table class='table-striped' style= 'width:100%'> 
                <thead> 
                  <tr>
                    <th></th>
                    <th>  Bezeichnung  </th>
                    <th>  Preis  </th>
                    <th>  Anzahl  </th>
                    <th>  Gesamt  </th>
                    <th>  Optionen  </th>
                  </tr>
                </thead>
                <tbody>";
        while($produkt = mysqli_fetch_object($res)){    
            foreach ($_SESSION['cart'] as $cart){
                if ($cart['pid'] == $produkt->pid){
                    $tempProd = new Produkt($produkt->pid, $produkt->bezeichnung, $produkt->preis, $produkt->bewertung, $produkt->katbezeichnung, "bildref");
                    echo '<tr>'
                            . '<td style="padding:3px;"><img src="res/img/prod'.$tempProd->pid.'.jpg" style="width: 40px; height: 40px;" class="img-thumbnail"></td>'
                            . '<td>'.$tempProd->bezeichnung.'</td>'
                            . '<td align="right">'.number_format($tempProd->preis ,"2",",",".").'€</td>'
                            . '<td align="right">'.$cart['anz'].' </td>'
                            . '<td align="right">'.number_format($tempProd->preis*$cart['anz'] ,"2",",",".").'€</td>'
                            . '<td style="padding:3px;"><input class="btn btn-default" type="button" value="+" onclick="ProduktZuWarenkorb('.$tempProd->pid.')">  '
                            . '<input class="btn btn-default" type="button" value="-" onclick="ProduktAusWarenkorb('.$tempProd->pid.')">'
                            . '</td>'
                    .    '</tr>';
                    $sum += $tempProd->preis*$cart['anz'];
                }
            }
        }
        echo '</tbody>
              <tfoot>
                <tr>
                  <td colspan="4" align="right" > Summe </td>
                  <td align="right">'.number_format($sum ,"2",",",".").'€</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>';
        return $sum;
        
    }
    
    #$query2 = 'SELECT `kid`,`anrede`,`vorname`,`nachname`,`adresse`,`plz`,`ort`,`land`,`email` FROM `kunde` WHERE uid ='.$_SESSION['user']->uid;
    function printKundeninfo($uid){
        $kid=-1;
        $query = 'SELECT `kid`,`anrede`,`vorname`,`nachname`,`adresse`,`plz`,`ort`,`land`,`email` FROM `kunde` WHERE uid ='.$uid;
        $res = mysqli_query($this->con, $query);
        if($res){       
            $kunde = mysqli_fetch_array($res);
            echo '<p>'.$kunde['anrede']. ' ' .$kunde['vorname'] . ' ' .$kunde['nachname'].'</p>'
                .'<p>'.$kunde['adresse']. ' </p>'
                .'<p>'.$kunde['plz'].' '.$kunde['ort'] .'</p>'
                .'<p>'.$kunde['land'].'</p>';    
                $kid = $kunde['kid'];
        return $kid;
        }else echo "<p>Kundeninformation nicht gefunden.</p>";
    }
    
    
           #$query3 = 'SELECT `zid`,`art`,`nummer` FROM `zahlungsinfo` WHERE `kid`='.$kid; 
    function printZahlungsOption($query3){
        $res = mysqli_query($this->con, $query3);
        while ($zinfo = mysqli_fetch_object($res)){
            # var_dump($zinfo);
            echo '<option value="'.$zinfo->zid.'">'.$zinfo->art.': '.$zinfo->nummer.'</option>';
        }         
    }
#         $query4 = 'SELECT `gid`, `code`, ablaufdatum-current_date() AS `ablaufwert`, `wert`, `valid` FROM `gutschein` where `code`="'.$_POST['gutscheincode'].'"'
    function getGutschein($query4, $gutscheincode){
        # echo "<br> query".var_dump($query4);   
        $gutschein = new Gutschein;
          $gutschein->gid = -1;        
          $gutschein->wert = 0;
          
        $res = mysqli_query($this->con, $query4);
        if($res && mysqli_num_rows($res) == 1){
                $gutsch = mysqli_fetch_object($res);
                # Gutschein validiern        
                # echo "<br> gutsch".var_dump($gutsch);
                if($gutsch->valid == 1 && $gutsch->ablaufwert >= 0 ){

                # Gutschein validiern         
                $gutschein = new Gutschein;
                $gutschein->gid = $gutsch->gid;        
                $gutschein->wert = $gutsch->wert;
                }else {
                echo "<script type='text/javascript'>alert('Der Gutschein ist nicht mehr gültig.')</script>";
                } 
        } else {
            echo "<script type='text/javascript'>alert('Der Gutscheincode ist nicht gültig.')</script>";
   
        }
        return $gutschein;
    }

# BESTELLUNG ABSCHICKEN
    
    function insertBestellungOhneGutschein($kid, $zid){
        
        if ($zid== "invalid") $zid=-1;
		$query = "INSERT INTO `bestellung` ( `kid`, `datum` ,`zid`) VALUES ('".$kid."', sysdate(), '".$zid."');";		
		#echo $query;
		$res = mysqli_query($this->con, $query);		
		#echo "</br> DB insert bestellung: ". var_dump($res)."<br>" ;
		if($res){
			return true;
		}else{
			return false;	
		}
        
    }
    
    function insertBestellung($kid, $zid, $gid, $gutscheinentwertung){
        ## Bestellung einfügen
                if ($zid== "invalid") $zid=-1;
		$query = "INSERT INTO `bestellung` ( `kid`, `datum` ,`zid`, `gid`,`gutscheinentwertung`) VALUES ('".$kid."', sysdate(), '".$zid."', '".$gid."', '".$gutscheinentwertung."');";		
		#echo $query;
		$res = mysqli_query($this->con, $query);		
		#echo "</br> DB insert bestellung: ". var_dump($res)."<br>" ;
		if($res){
			return true;
		}else{
			return false;	
		}
                
    }
    
    function getLastBestellungsID(){
        ## Letzt eingefügte BestellID  bekommen
		$query = "SELECT `bid` FROM `bestellung` ORDER BY `datum` DESC LIMIT 1";
                $res = mysqli_query($this->con, $query);		
                $x = mysqli_fetch_object($res);
                return $x->bid;
    }
        
    function updateGutschein($gid, $restguthaben){
        ## Bestellung einfügen
                if ($restguthaben == 0) {
                    $query = "UPDATE `gutschein` SET `valid`= '0' WHERE `gid`= '".$gid."';";		
                    $res = mysqli_query($this->con, $query);
                } else {
                    $query = "UPDATE `gutschein` SET `wert`= '".$restguthaben."' WHERE `gid`= '".$gid."';";		
                    $res = mysqli_query($this->con, $query);
                }
		#echo "</br> DBUpdateGutschein: ". var_dump($res)."<br>" ;
		if($res){
			return true;
		}else{
			return false;	
		}           
    }
    function insertCart($cart, $bid){
                $query = "INSERT INTO `b_has_p` ( `pid`, `menge` ,`bid`) VALUES "; 
                $count = 0;
                foreach ($cart as $prod) {
                    if ($count == 0){
                    $query .= "(".$prod['pid'].",".$prod['anz'].",".$bid.")";
                    } else {
                    $query .= ", (".$prod['pid'].",".$prod['anz'].",".$bid.")";    
                    }
                    $count ++;
                }
                #echo $query;
                
		$res = mysqli_query($this->con, $query);		
		#echo "</br> B_has_P insert bestellung: ". var_dump($res)."<br>" ;
                
                if($res){
			return true;
		}else{
			return false;	
		}     
    }
    
    function commitBestellung(){
            mysqli_commit($this->con);
            echo "<script type='text/javascript'>alert('Bestellung erfolgreich abgeschickt!')</script>";
            unset($_SESSION['cart']);
            unset($_SESSION['gutschein']);
    }
    
    function startBestellung(){
        mysqli_autocommit($this->con, FALSE);
    }
    
    function endBestellung(){
        mysqli_autocommit($this->con, TRUE);
    }


# LOGIN & REGSITRATION
        
    function countUserCheck($regUsername){
        $query = "SELECT * FROM `user` WHERE `username` = '".$regUsername."' AND `aktiv` = '1';";		
	#echo $query;
        $res = mysqli_query($this->con, $query); 
        
        if(mysqli_num_rows($res) > 0) return true;
        else return false;
    }
    
    function checkPW($regUsername, $regPW){
        $query = "SELECT * FROM `user` WHERE `username` = '".$regUsername."' AND `passwort` = '".md5($regPW)."';";		
	#echo $query;
        $res = mysqli_query($this->con, $query); 
        
        if(mysqli_num_rows($res) > 0) return true;
        else return false;
    }
    
    function makeUser($regUsername, $regPW){
        $query = "SELECT `uid`, `username`, `rolle` FROM `user` WHERE `username` = '".$regUsername."' AND `passwort` = '".md5($regPW)."';";
        $res = mysqli_query($this->con, $query);  
                
        $userarray = mysqli_fetch_array($res);
        #echo var_dump($userarray);
        $user = new User();
        $user->uid = $userarray['uid'];
        $user->username = $userarray['username'];
        $user->rolle = $userarray['rolle'];
        
        #echo "<br>". var_dump($user);
        return $user;
        
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
                
#Bestellübersicht
    
    function printBestellListe($uid) {
        $query ="SELECT `bid`,`datum`, `art`, `gutscheinentwertung`, `gid` FROM `bestellung` JOIN `zahlungsinfo` ON `bestellung`.`zid`=`zahlungsinfo`.`zid` JOIN `kunde` ON `bestellung`.`kid`=`kunde`.`kid` WHERE `kunde`.`uid`='".$uid."' ORDER BY `datum`";
        $res = mysqli_query($this->con, $query);  
        #var_dump($res); 
        if(mysqli_num_rows($res)==0){
            echo "Keine Bestellungen";
        } else {
            echo "<table class='table-striped' style= 'width:100%'> 
                    <thead> 
                      <tr>
                        <th>  Bestellnummer  </th>
                        <th>  Datum  </th>
                        <th>  Zahlungsart  </th>
                        <th>  Gutschein  </th>
                        <th>  Option  </th>
                      </tr>
                    </thead>
                    <tbody>";
            while($bestell = mysqli_fetch_object($res)){

                    if ($bestell->gutscheinentwertung > 0){
                    $gut = "Gutschein:".$bestell->gid;
                    } else { 
                        $gut = "-";
                    }

                    echo '<tr>'
                            . '<td>'.$bestell->bid.'</td>'
                            . '<td>'.$bestell->datum.'</td>'
                            . '<td>'.$bestell->art.' </td>'
                            . '<td>'.$gut.'</td>'
                            . '<td style="padding:3px;"><input class="btn btn-default" type="button" value="Details" onclick="?????????">  '
                            . '<input class="btn btn-default" type="button" value="Rechnung drucken" onclick="?????????">  '
                            . '</td>'
                    .    '</tr>';
            }
            echo '</tbody>
                </table>';   
        }
    }
    
    
    function printGutscheinliste() {
        $query ="SELECT `gid`, `code`, `ablaufdatum`, `wert`, `valid` FROM `gutschein` ORDER BY `valid` DESC, `gid`  ";
        $res = mysqli_query($this->con, $query);  
        #var_dump($res); 
        if(mysqli_num_rows($res)==0){
            echo "Keine Gutscheine";
        } else {
            echo "<table class='table-striped' style= 'width:100%'> 
                    <thead> 
                      <tr>
                        <th>  Gutscheinnummer  </th>
                        <th>  Code  </th>
                        <th>  Ablaufdatum  </th>
                        <th>  Wert  </th>
                        <th>  Valid  </th>
                      </tr>
                    </thead>
                    <tbody>";
            while($gut = mysqli_fetch_object($res)){

                    if ($gut->valid == 0){
                    $vgut = "Entwertet";
                    } else { 
                        $vgut = "Gültig";
                    }

                    echo '<tr>'
                            . '<td>'.$gut->gid.'</td>'
                            . '<td>'.$gut->code.'</td>'
                            . '<td>'.$gut->ablaufdatum.' </td>'
                            . '<td align="right">'.number_format($gut->wert ,"2",",",".").'€ </td>'
                            . '<td align="right">'.$vgut.'</td>'
                            . '</td>'
                    .    '</tr>';
            }
            echo '</tbody>
                </table>';   
        }
    }
    
    
    
    
    
    
 

#ENDE
}
    



