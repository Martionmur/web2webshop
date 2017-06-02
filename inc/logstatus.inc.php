<?php
if (isset($_SESSION['user']) && (
        ($_SESSION['user']->rolle == "kunde") || 
        ($_SESSION['user']->rolle == "admin")
    )){
       echo '<li><a> Hallo '.$_SESSION['user']->username. '! </a></li><li><a href="index.php?tab=logout"> Logout </a></li>';
    } else { 
       echo '<li><a href="index.php?tab=register"> Register </a></li>'
           .'<li><a href="index.php?tab=login"> Login </a></li>';
    }
 
