<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">WET2</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<?php
if (!isset($_SESSION[$user])){
    $xmlnav = simplexml_load_file("config/navigation1.xml");
}
elseif ($_SESSION[$user->rolle] = "kunde") {
    $xmlnav = simplexml_load_file("config/navigation2.xml");
} 
elseif ($_SESSION[$user->rolle] = "admin") {
    $xmlnav = simplexml_load_file("config/navigation3.xml");
}
    $cnt = 0;
    
    foreach($xmlnav->eintrag as $eintrag){
        if ($cnt==0) echo "<li class='active'><a>$eintrag->title</a></li>";
        else echo "<li><a>$eintrag->title</a></li>";
        $cnt = $cnt +1;
        ##link_to wird noch nicht angesprochen -> muss zuerst definiert werden, wie z.B. "Home" geladen werden soll
    }
    
    
    
#Martin:   
## ich überleg hier in dem Block wie man den User in der Session ansprechen könnte. 
### Ob man über header() macht ist nicht die intention. 
### xml flexibel in der navigation auslesen je nach rolle  ist sicher auch hübsch  
#Matthias: rechte seite der navbar muss ich noch einbauen also reg/login, login status/warenkorb/suche, adminzeugs
/*    
if (!isset($_SESSION[$user])){ 
    header('Location: nav/anonym.php'); 
} elseif ($_SESSION[$user]->rolle == "kunde") {
    header('Location: nav/kunde.php'); 
} elseif ($_SESSION[$user]->rolle == "admin") {
    header('Location: nav/admin.php'); 
}
*/

?>

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
