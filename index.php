<?php
    include ("utility/DB.class.php");
    include("model/Produkt.class.php");
    include("model/User.class.php");
    include("model/Gutschein.class.php");
    

    session_start();
    #session_destroy();
    #session_start();
    if (!isset($_SESSION['user'])){
    $u = new User;
    $u->rolle="kun";
    $_SESSION['user']= $u;
    }
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];    
    }
    
    # Dummy Warenkorb
        $_SESSION['cart'] =  [
        ["pid"=>1, "anz" => 1 ],
        ["pid"=>2, "anz" => 2 ],
        ["pid"=>3, "anz" => 2 ],
    ];
        
# Über navigation login und logout
# 
#                if get ['tab'] = logout user->logout
        
?>
<!DOCTYPE html>


<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/custom.css" rel="stylesheet" type="text/css" />
        <!-- BOOTSRAP Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <meta charset="UTF-8">

        

    </head>
    <body>
     
        <?php
            include("inc/navigation.php");

        ?>    
        
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
            default:
                include  ("sites/home.php");
            }
        ?>
        </div>
        
    </body>
</html>
