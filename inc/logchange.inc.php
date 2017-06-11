<?php
#Login postet logUsername und das wird in User.class.php geprüft
if(!empty($_POST['logUsername'])){
    $success = $_SESSION['user']->checkLogin();
    # var_dump($success);
    if ($success){
        $_GET['tab']='produkte';
    }
}
# check register
if(!empty($_POST['fromSubmit'])){
    $success = $_SESSION['user']->checkRegister();
    # var_dump($success);
    if ($success){
        $_GET['tab']='login';
    }
}

# check register
if (isset($_GET['tab']) && $_GET['tab'] == 'logout' ) {
    $success = $_SESSION['user']->logout();
    # var_dump($success);
    if ($success){
        $_GET['tab']='home';
    }
}