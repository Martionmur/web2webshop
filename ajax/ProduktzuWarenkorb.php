<?php   
    session_start();
    
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    echo"post ist nicht leer";
}
    
if(!empty($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] ++;
    } else {
    $tmparray=['pid'=>$id, 'anz'=>1];
    array_push($_SESSION['array'], $tmparray);
    
    
}
    var_dump($_SESSION);

?>
