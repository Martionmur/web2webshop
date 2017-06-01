<?php

        /*
        $db = new newDB();
        $db->doConnect();
        $wahr = false;
        
        if ($db->countUserCheck("testuser")) {
            echo "<script type='text/javascript'>alert('Username bereits vergeben.')</script>";
        }
        else {
            
        #if($db->insertUser("Testibus", "Testibuspw")) echo "hat gepasst";
        #else echo"hat nicht gepasst";
        #}
        
        $testUID=$db->getUserID("Testus");
        echo"TestUID:";
        var_dump($testUID);
        
        
        #if($db->insertKunde("$testUID", "Herr", "Matthias", "Pfandler", "Testadresse", "1180", "Wien", "Österreich", "mpfandler@lalal.at")) echo "kunde angelegt";
        #else echo "Kunde wurde nicht angelegt";
        $teskID = $db->getKundenID($testUID);
        echo"TestKID:";
        var_dump($teskID);
        */

## Validate form values from form <- form 'action = ""' so data is send to site itself again
    $valid = true;
    #sind alle Daten eingegeben?
   if(!empty($_POST)){
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
        || $_POST['formZahlungsart'] == "invalid"
        || !isset($_POST['formZahlungsdet']) || $_POST['formZahlungsdet'] == ""){
            $valid = false;
            echo "<script type='text/javascript'>alert('Bitte alle Felder ausfüllen')</script>";
            
        }
    #passwort validieren
        if(isset($_POST['formPasswort1']) && (isset($_POST['formPasswort2']))){
            if($_POST['formPasswort1'] != $_POST['formPasswort2'])
            {
                $valid = false;
                echo "<script type='text/javascript'>alert('Passwörter nicht gleich')</script>";
            }
        }
    
        if ($valid == true) {
            $db = new newDB();
            $db->doConnect();
        
            if($db->insertUser($_POST['formUsername'], md5($_POST['formPasswort1']))) echo "User wurde angelegt";
            else echo "User konnte nicht angelegt werdden";
        
            $uid =$db->getUserID($_POST['formUsername']);       
            echo"GetUserID: ";
            var_dump($uid);
            if($db->insertKunde("$uid", $_POST['formAnrede'], $_POST['formVorname'], $_POST['formNachname'], $_POST['formAdresse'], $_POST['formPLZ'], $_POST['formOrt'],"Österreich", $_POST['formEmail'])) echo "kunde angelegt";
            else echo "Kunde wurde nicht angelegt";
        
            $kid =$db->getKundenID($uid);       
            echo "GEt KundenID: ";
            var_dump($kid);
            if($db->insertZahlungsinfo($kid, $_POST['formZahlungsart'], $_POST['formZahlungsdet'])) echo "Zahlungsinfo angelegt" ;
            else echo "Zahlungsinfo nicht angelegt.";
        
            ### Erfolg! Go to LogIn after Registration
            ### DisconnectDB
        }
}


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
            <!--check valid values for dropdown-->
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
          <input type="text" class="form-control" id="Zahlungsdet" name="formZahlungsdet" placeholder="IBAN, Kreditkartennummer, etc.">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default" name="fromSubmit" value="Regstrieren">Registrieren</button>
        </div>
      </div>
    </form>
  </div>

