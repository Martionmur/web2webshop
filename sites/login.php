<?php
#include ("utility/DB.class.php");
## get input

## check input
### User vorhanden 
### PW corr^ect

## Login -> Uid, name, rolle into session via class
### Checkbox is set send cookie

## Validate form values from form - form 'action = ""' so data is send to site itself again



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

