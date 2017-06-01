<?php
if (isset($_SESSION['user']) && (
        ($_SESSION['user']->rolle == "kunde") || 
        ($_SESSION['user']->rolle == "admin")
    )){
       echo '<li> Hallo '.$_SESSION['user']->username. '! <a href="index.php?tab=logout.php"> Logout </a></li>';
    } else { 
       echo '<li><a href="index.php?tab=register.php"> Register </a></li>'
           .'<li><a href="index.php?tab=login.php"> Login </a></li>';
    }
 
