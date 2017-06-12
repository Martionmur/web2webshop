<?php   
    session_start();
    
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(!empty($_POST['id'])) {
    $id = $_POST['id'];


if(!empty($_SESSION['cart'])){
    $index=0;
    $success = false;
    foreach($_SESSION['cart'] as $cart) {  
        #Wenn im Cart der Session bereits ein Produkt mit der übergebenen ID enthalten ist, muss die Anzahl erhöht werden
        if($cart['pid']==$id){
            $tmpanz = $_SESSION['cart'][$index]['anz']+1;
            $_SESSION['cart'][$index]['anz']= $tmpanz;
            var_dump($_SESSION);
            $success=true;
        }
        $index = $index+1;
        }
        #Wenn noch kein Produkt mit übergebener ID in Cart ist, per array_push in Cart anhängen
        if(!$success){
            $tmpprod=['pid'=>(int)$id, 'anz'=>1];
            array_push($_SESSION['cart'], $tmpprod);

        }    
}
else{
  #Wenn $_Session['cart'] bisher leer ist -> ohne weiteres Prüfen Produkt in Cart ablegen  
  $tmpprod=['pid'=>(int)$id, 'anz'=>1];
  array_push($_SESSION['cart'], $tmpprod);  
}
}

?>
