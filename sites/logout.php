<?php
unset($_SESSION['user']);
unset($_SESSION['gutschein']);
setcookie('remember' ,"false", time()-1,'/');
setcookie('uid' ,"", time()-1,'/');
setcookie('username' ,"", time()-1,'/');
setcookie('rolle' ,"", time()-1,'/');
echo "<h1> Sie sind nun abgemeldet"
?>

