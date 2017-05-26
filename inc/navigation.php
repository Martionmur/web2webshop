<?php
## ich überleg hier in dem Block wie man den User in der Session ansprechen könnte. 
### Ob man über header() macht ist nicht die intention. 
### xml flexibel in der navigation auslesen je nach rolle  ist sicher auch hübsch


if (!isset($_SESSION[$user])){ 
    header('Location: nav/anonym.php'); 
} elseif ($_SESSION[$user->rolle] = "kunde") {
    header('Location: nav/kunde.php'); 
} elseif ($_SESSION[$user->rolle] = "admin") {
    header('Location: nav/admin.php'); 
}

