<?php   
    session_start();
    
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    echo"post ist nicht leer";
}
#### - ab hier in funktion für warenkorb post?
if(!empty($_SESSION['cart'])){
    $index=0;
    $success = false;
    foreach($_SESSION['cart'] as $cart) {  
        if($cart['pid']==$id){
            $tmpanz = $_SESSION['cart'][$index]['anz']+1;
            $_SESSION['cart'][$index]['anz']= $tmpanz;
            var_dump($_SESSION);
            $success=true;
        }
        $index = $index+1;
        }
        
     if(!$success){
        $tmpprod=['pid'=>(int)$id, 'anz'=>1];
        array_push($_SESSION['cart'], $tmpprod);
        #initializes $id as a string
        var_dump($_SESSION);
    }    
}
else{
  $tmpprod=['pid'=>(int)$id, 'anz'=>1];
  array_push($_SESSION['cart'], $tmpprod);  
  echo"pid was NOT here -> new pid in cart";
}

#var_dump($_SESSION);

?>
