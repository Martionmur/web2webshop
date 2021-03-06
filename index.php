<?php
    #include ("config/dbaccess.php");
    include ("utility/DB.class.php");
    include("model/Produkt.class.php");
    include("model/User.class.php");
    include("model/Gutschein.class.php");
    session_start();
    #session_destroy();
    #session_start();
    if(isset($_COOKIE['remember'])){
        if($_COOKIE['remember']=="true"){
        $u = new User;
        $u->uid=$_COOKIE['uid'];
        $u->username=$_COOKIE['username'];
        $u->rolle=$_COOKIE['rolle'];
        $_SESSION['user']=$u;
        }
    }
    
    if (!isset($_SESSION['user'])){
    $u = new User;
    $u->rolle="anon";
    $_SESSION['user']= $u;
    }

        
# Über navigation login und logout
# 
#                if get ['tab'] = logout user->logout
    
#var_dump($_SESSION)
        
?>
<!DOCTYPE html>




<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- BOOTSRAP Latest compiled and minified JavaScript -->
        <link href="res/css/jquery-ui.css" rel="stylesheet">    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript" src="res/js/js_cart.js"></script>
            <script type="text/javascript" src="res/js/js_search.js"></script>
        <link rel="stylesheet" href="res/css/custom.css" rel="stylesheet" type="text/css" />    
            <script>
                $(document).ready(function(){
                   $(".thumbnail img").draggable({helper:"clone"}); 
                   $("#cart").droppable({
                       tolerance:"pointer",
                       drop: function(event,ui){
                        x = ui.draggable.attr('value');   
                        add_to_cart(x);
                       }
                   });
                });
            </script>
        <title>Webshop WET2</title>    
            
        <meta charset="UTF-8">
        

        

    </head>
    <body>
        <div id="fixed">
        <?php
            include("inc/logchange.inc.php");        
            include("inc/navigation.php");
        ?>    
        </div>
        
        <div id="content">
        <?php
        if(!isset($_GET['tab'])){
            $_GET['tab']= 'home';
        }
            switch($_GET['tab']) {
            case 'login':
                include ("sites/login.php");
                break;
            case 'logout':
                include ("sites/logout.php");
                break;
            case 'register':
                include  ("sites/register.php");
                break;
            case 'produkte':
                include  ("sites/produkte.php");
                break;
            case 'warenkorb':
                include  ("sites/warenkorb.php");
                break;
            case 'produkte_bearbeiten':
                include  ("sites/produkte_bearbeiten.php");
                break;
            case 'kunden_bearbeiten':
                include  ("sites/kunde_bearbeiten.php");
                break;
            case 'gutschein_verwalten':
                include  ("sites/gutschein_verwalten.php");
                break;
            case 'meinkonto':
                include  ("sites/meinkonto.php");
                break;
            case 'rechnung':
                include  ("sites/rechnung.php");
                break;
            default:
                include  ("sites/home.php");
            }
        ?>
        </div>
        
    </body>
</html>
