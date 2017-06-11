<?php
 
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/Custom.css" rel="stylesheet" type="text/css" />        
<!-- BOOTSRAP Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<title>Webshop WET2</title>



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
    
//    foreach($xmlnav->eintrag as $eintrag){
//        if ($cnt==0) echo "<li class='active'><a href = 'index.php?tab=".$eintrag->link_to."'>".$eintrag->title."</a></li>";
//        else echo "<li><a href = 'index.php?tab=".$eintrag->link_to."'>".$eintrag->title."</a></li>";
//        
//        $cnt = $cnt +1;
//        ##link_to wird noch nicht angesprochen -> muss zuerst definiert werden, wie z.B. "Home" geladen werden soll
//    }
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
    echo "  <form class='navbar-form navbar-left'>
                <div class='form-group'>
                    <input type='text' class='form-control' placeholder='Search' onkeyup=searchProd('Tofu')>
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
            </form>
        <ul class ='nav navbar-nav navbar-right'>";
    
//    foreach($xmlnav->side_eintrag as $s_eintrag){
//        if ($cnt==0) echo "<li class='active'><a>$eintrag->title</a></li>";
//        else echo "<li><a>$s_eintrag->title</a></li>";
//        $cnt = $cnt +1;
//        ##link_to wird noch nicht angesprochen -> muss zuerst definiert werden, wie z.B. "Home" geladen werden soll
//    }
//    

    
    #LogStatus
        include 'inc/logstatus.inc.php';
        
    #Warenkorb
        include 'inc/cartstatus.inc.php';
?>

         
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
