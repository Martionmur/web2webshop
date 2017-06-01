<?php
#include("model/Produkt.class.php");
#include("model/User.class.php");

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
    
    function printWarenkorb($query){
        $res = mysqli_query($this->con, $query);        
        $sum = 0.00;
        
        echo "<table class='table-striped'> 
                <thead> 
                  <tr>
                    <th></th>
                    <th>  Bezeichnung  </th>
                    <th>  Preis  </th>
                    <th>  Anzahl  </th>
                    <th>  Gesamt  </th>
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
                    .    '</tr>';
                    $sum += $tempProd->preis*$cart['anz'];
                }
            }
        }
        echo '</tbody>
              <tfoot>
                <tr>
                  <td colspan="4" align="right" > Summe </td>
                  <td align="right">'.number_format($sum ,"2",",",".").'€<td>
                </tr>
              </tfoot>
            </table>';
        return $sum;
        
//        $res = mysqli_query($this->con, $query);
//        $sum = 0.00;
//        
//        echo "<table class='table-striped'> 
//                <thead> 
//                  <tr>
//                    <th></th>
//                    <th>  Bezeichnung  </th>
//                    <th>  Preis  </th>
//                    <th>  Anzahl  </th>
//                    <th>  Gesamt  </th>
//                  </tr>
//                </thead>
//                <tbody>";
//        while($produkt = mysqli_fetch_object($res)){    
//            $tempProd = new Produkt($produkt->pid, $produkt->bezeichnung, $produkt->preis, $produkt->bewertung, $produkt->katbezeichnung, "bildref");
//            echo '<tr>'
//                    . '<td style="padding:3px;"><img src="res/img/prod'.$tempProd->pid.'.jpg" style="width: 40px; height: 40px;" class="img-thumbnail"></td>'
//                    . '<td>'.$tempProd->bezeichnung.'</td>'
//                    . '<td align="right">'.number_format($tempProd->preis ,"2",",",".").'€</td>'
//                    . '<td align="right"> ?1 </td>'
//                    . '<td align="right">' .number_format($tempProd->preis*1 ,"2",",",".").'€</td>'
//            .    '</tr>';
//            $sum += $tempProd->preis;
//        }
//        echo '</tbody>
//              <tfoot>
//                <tr>
//                  <td colspan="4" align="right" > Summe </td>
//                  <td align="right">'.number_format($sum ,"2",",",".").'€<td>
//                </tr>
//              </tfoot>
//            </table>';
//        return $sum;
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
    
    function checkPW($regUsername, $regPW){
        $query = "SELECT * FROM `user` WHERE `username` = '".$regUsername."' AND `passwort` = '".md5($regPW)."';";		
	//echo $query;
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

#ENDE
}
    



