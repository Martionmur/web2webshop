<?php   
    session_start();
    
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    echo"post ist nicht leer";
}
    
if(!empty($_SESSION['cart'])){
    $index=0;
    $success = false;   
    foreach($_SESSION['cart'] as $cart) {  
        if($cart['pid']==$id){
            #wenn 'anz' >1 muss Anzahl nur um 1 verringert werden
            if($cart['anz']>1){
            $tmpanz = $_SESSION['cart'][$index]['anz']-1;
            $_SESSION['cart'][$index]['anz']= $tmpanz;
            var_dump($_SESSION);
            }
            #ist 'anz' = 1 muss der Eintrag der Session unset werden
            else unset($_SESSION['cart'][$index]);
        }
        $index = $index+1;
        }
        var_dump($_SESSION);  
}
?>
