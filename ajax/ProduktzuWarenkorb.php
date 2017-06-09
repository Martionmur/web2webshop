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
            $tmpanz = $_SESSION['cart'][$index]['anz']+1;
            $_SESSION['cart'][$index]['anz']= $tmpanz;
            var_dump($_SESSION);
            $success=true;
        }
        $index = $index+1;
        }
        
     if(!$success){
        $tmpprod=['pid'=>$id, 'anz'=>1];
        array_push($_SESSION['cart'], $tmpprod); 
        var_dump($_SESSION);
    }    

#if(in_array([$id,'%'],$_SESSION['cart'])){
#    foreach($_SESSION['cart'] as $k => $v) {
#	if($id == $v->pid){
#       var_dump($_SESSION['cart'][$k]);
        #$tmpanz = $_SESSION['cart'][$k]['anz'];
        #$tmpanz = $tmpanz+1;
	#$_SESSION['cart'][$k]['anz'] = $tmpanz;	
        #echo"pid was here -> +1";
}

#else{
 #   $tmpprod=['pid'=>$id, 'anz'=>1];
  #  array_push($_SESSION['cart'], $tmpprod);  
    #echo"pid was NOT here -> new pid in cart";
#}

#var_dump($_SESSION);

?>
