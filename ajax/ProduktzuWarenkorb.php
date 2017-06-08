<?php   
    session_start();
    
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    echo"post ist nicht leer";
}
    
#if(!empty($_SESSION['cart'][$id])){
#    echo"session ist nicht leer";
#    $_SESSION['cart'][$id] ++;
#} else {
#    $_SESSION['cart'][$id] = 1;
    var_dump("$_SESSION");
    
#}
    

?>
