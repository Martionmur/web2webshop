<?php
## get input

## check input
### User vorhanden 
### PW correct

## Login -> Uid, name, rolle into session via class
### Checkbox is set send cookie

## Validate form values from form - form 'action = ""' so data is send to site itself again


    if(    !isset($_POST['logUsername'])    || $_POST['logUsername'] = ""
        || !isset($_POST['logPasswort'])    || $_POST['logPasswort'] = ""){
            alert("Bitte beide Felder ausfüllen.");
        } else {
            
        $db = new DB();
        $db->doConnect();
        
        if ($db->countUserCheck($logUsername) != 1){
            return "bad username"; 
            alert ("Bitte überprüfen Sie den Username");
            if (!$db->checkPW($logUsername, $logPasswort)){
                ## check PW returned True oder irgendwas FEHLERSUCHE!
                return "bad password"; 
                alert ("Falsches Passwort");

            } else { 
                $user = $db->makeUser($logUsername, $logPasswort) ;
                ## $_SESSION['user'] = $user; Wie zuweisen   
                
                if ($logRemember){
                    ## Set cookie
                }

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

