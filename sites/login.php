<?php
    include ("utility/DB.class.php");
## get input

## check input
### User vorhanden 
### PW correct

## Login -> Uid, name, rolle into session via class
### Checkbox is set send cookie

## Validate form values from form - form 'action = ""' so data is send to site itself again


    if(    !isset($_POST['logUsername'])    || $_POST['logUsername'] == ""
        || !isset($_POST['logPasswort'])    || $_POST['logPasswort'] == ""){
            echo "<script type='text/javascript'>alert('Bitte Username und Passwort ausfüllen.')</script>";
        } else {
            
        $db = new DB();
        $db->doConnect();
        
        if ($db->countUserCheck($_POST['logUsername']) != 1){
            echo "<script type='text/javascript'>alert('Bitte überprüfen Sie den Username')</script>";
            if (!$db->checkPW($_POST['logUsername'], $_POST['logPasswort'])){
                ## check PW returned True oder irgendwas FEHLERSUCHE!
            echo "<script type='text/javascript'>alert('Falsches Passwort!')</script>";
                alert ("Falsches Passwort");

            } else { 
                $user = $db->makeUser($_POST['logUsername'], $_POST['logPasswort']) ;
                $_SESSION['user'] = $user ; ## Wie zuweisen? Richtiges Objekt?  
                
                if ($logRemember){
                    ## Set cookie
                }
                ## Wenn Erfolgreich   -> Hallo User
            }
        }
        
        
    }



?>
<div class="col-sm-4"id="loginArea">
    <h1>Login</h1>
    <form class="form-horizontal" action="" method="post" name="loginForm" id="loginForm">
       
      <div class="form-group">
        <label for="logUsername" class="col-sm-4 control-label">Username</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="logUsername" name="logUsername">
        </div>
      </div>

      <div class="form-group">
        <label for="passwort" class="col-sm-4 control-label">Passwort</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="passwort" name="logPasswort">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-1">
            <input type="checkbox" class="form-control" id="remember" name="logRemember">
        </div>
        <label for="remember" class="col-sm-6 control-label" style="text-align: left; font-weight: normal" >angemeldet bleiben</label>
 
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default" name="formLogin" value="Regstrieren">Submit</button>
        </div>
      </div>
    </form>
  </div>

