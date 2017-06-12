<!-- Steuert navbar mit xml und fügt Logstatus und Cartstatus an-->

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



if ((!empty($_SESSION['user'])) && $_SESSION['user']->rolle == "kunde") {
    $xmlnav = simplexml_load_file("config/navigation2.xml");
} 
elseif ((!empty($_SESSION['user'])) && $_SESSION['user']->rolle == "admin") {
    $xmlnav = simplexml_load_file("config/navigation3.xml");
}
else {
    $xmlnav = simplexml_load_file("config/navigation1.xml");
}    
    $cnt = 0;

    if(!isset($_GET['tab'])){
        $_GET['tab']= 'home.php';
    }
    
    foreach($xmlnav->eintrag as $eintrag){
        if ($_GET['tab'] == $eintrag->link_to) {
            echo "<li class='active' ";
        } else {echo "<li ";}
        echo "> <a href = 'index.php?tab=".$eintrag->link_to."'>".$eintrag->title."</a></li>";
        }
    
    #Suche: insert der jquery-funktion hier?
    echo "<ul class ='nav navbar-nav navbar-right'>";
 

    
    #LogStatus
        include 'inc/logstatus.inc.php';
        
    #Warenkorb
        include 'inc/cartstatus.inc.php';
?>

         
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
