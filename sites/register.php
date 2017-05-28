<?php
## Validate form values from form <- form 'action = ""' so data is send to site itself again
    $valid = true;

    if(    $_POST['formAnrede'] == "invalid"
        || !isset($_POST['formVorname'])     || $_POST['formVorname'] == "" 
        || !isset($_POST['formNachname'])    || $_POST['formNachname'] == ""
        || !isset($_POST['formAdresse'])     || $_POST['formNachname'] == "" 
        || !isset($_POST['formPLZ'])         || $_POST['formPLZ'] == ""
        || !isset($_POST['formOrt'])         || $_POST['formOrt'] == ""
        || !isset($_POST['formEmail'])       || $_POST['formEmail'] == ""
        || !isset($_POST['formUsername'])    || $_POST['formUsername'] == ""
        || !isset($_POST['formPasswort1'])   || $_POST['formPasswort1'] == ""
        || !isset($_POST['formPasswort2'])   || $_POST['formPasswort2'] == ""
        || $_POST['formZahlungsArt'] == "invalid"
        || !isset($_POST['formZahlungsDet']) || $_POST['formZahlungsDet'] == ""){
            $valid = false;
            alert("Bitte alle Felder ausfüllen."); #alert != php-funktion
            
        }
    
    if($_POST['formPasswort1'] != $_POST['formPasswort2'])
        {
            $valid = false;
            alert("Passwörter gleichen sich nicht.");
        }
        
    if ($valid == true) {
        $db = new DB();
        $db->doConnect();
        
        $uval=$db->insertUser($_POST['formUsername'], md5($_POST['formPasswort1']));
        if($uval === FALSE){return "bad user insert";}
        
        $uid =$db->getUserID($_POST['formUsername']);       
        $kval=$db->insertKunde($uid, $formAnrede, $formVorname, $formNachname, $formAdresse, $formPLZ, $formOrt, $formEmail);
        if($kval === FALSE){return "bad kunde insert";}
        
        $kid =$db->getKundenID($uid);       
        $zval=$db->insertZahlungsinfo($kid, $_POST['formZahlungsArt'], $_POST['formZahlungsDet']);
        if($zval === FALSE){return "bad zahlungsinfo insert";} 
        
        ### Erfolg! Go to LogIn after Registration
        ### DisconnectDB
    }

## get input

## check input:
### fields not empty + no leerzeichen
### PW 2x ident
### adresse contains hausnumber? check not nessesary

### Username nicht bereits vorhanden - checkt DB.insertUser()

## DB
### insert User - 
### get Userid for Username
### insert Kunde
### get Kundenid from Userid
### insert Zahlungsinformation

###Erfolgsmeldung



?>
<div class="col-sm-6"id="regArea">
    <h1>Registrieren</h1>
    <p>Bitte registrieren Sie sich im Web2Webshop</p>   
    <form class="form-horizontal" action="" method="post" name="registerForm" id="registerForm">
        
                <h4 class="col-sm-offset-4 col-sm-8"> Anschrift </h4>
        
      <div class="form-group">
        <label for="Anrede" class="col-sm-4 control-label">Anrede</label>
        <div class="col-sm-8"> 
          <select name="formAnrede" class="form-control" id="Anrede">
            <option value="invalid">-</option>
            <option value="Herr">Herr </option>
            <option value="Frau">Frau </option>
          </select>
        </div>
      </div>
        
      <div class="form-group">
        <label for="Vorname" class="col-sm-4 control-label">Vorname</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Vorname" name="formVorname" placeholder="Vorname">
        </div>
      </div>
        
     <div class="form-group">
        <label for="Nachname" class="col-sm-4 control-label">Nachname</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Nachname" name="formNachname" placeholder="Nachname">
        </div>
      </div>
        
     <div class="form-group">
        <label for="Adresse" class="col-sm-4 control-label">Adresse</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Adresse" name="formAdresse" placeholder="Straße & Hausnummer">
        </div>
      </div>
        
     <div class="form-group">
        <label for="PLZ" class="col-sm-4 control-label">PLZ</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="PLZ" name="formPLZ" placeholder="PLZ">
        </div>
      </div>
        
     <div class="form-group">
        <label for="Ort" class="col-sm-4 control-label">Ort</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Ort" name="formOrt" placeholder="Ort">
        </div>
      </div>
            
      <div class="form-group">
        <label for="Email" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8">
          <input type="email" class="form-control" id="Email"  name="formEmail">
        </div>
      </div>
        
        <h4  class="col-sm-offset-4 col-sm-8"> Userinformationen </h4>
            
      <div class="form-group">
        <label for="Username" class="col-sm-4 control-label">Benutzername</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Username" name="formUsername">
        </div>
      </div>

      <div class="form-group">
        <label for="passwort1" class="col-sm-4 control-label">Passwort</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="passwort1" name="formPasswort1">
        </div>
      </div>
      
      <div class="form-group">
        <label for="passwort2" class="col-sm-4 control-label">Passwort Wiederholung</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="passwort2" name="formPasswort2">
        </div>
      </div>
                <h4 class="col-sm-offset-4 col-sm-8"> Zahlungsinformationen </h4>
                
      <div class="form-group">
        <label for="Art" class="col-sm-4 control-label">Anrede</label>
        <div class="col-sm-8"> 
          <select name="formZahlungsart" class="form-control" id="Art">
            <option value="invalid">-</option>
            <option value="Visa">Visa </option>
            <option value="Mastercard">Mastercard </option>
            <option value="Bankeinzug">Bankeinzug </option>
            <option value="Postversand">Postversand </option>
          </select>
        </div>
      </div>
        
      <div class="form-group">
        <label for="Zahlungsdet" class="col-sm-4 control-label">Zahlungsdetails</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Zahlungsdet" name="formZahlungsDet" placeholder="IBAN, Kreditkartennummer, etc.">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default" name="fromSubmit" value="Regstrieren">Registrieren</button>
        </div>
      </div>
    </form>
  </div>

