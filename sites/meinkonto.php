<?php
        $db = new newDB();
        $db->doConnect();
        
        
        # POST aus Kundeninfo bearbeiten Formular bearbeiten
        if(!empty($_POST['ChangeKunde'])){
            if ($db->checkPW($_SESSION['user']->username, $_POST['formPasswort'])!= 1){
                echo "<script type='text/javascript'>alert('Falsches Passwort!')</script>";
            } else {
                if (!empty($_POST['formVorname']) && !empty($_POST['formNachname']) && !empty($_POST['formAdresse']) && !empty($_POST['formPLZ']) &&!empty($_POST['formOrt']) && !empty($_POST['formEmail']) ){
                    $db->updateKunde($_SESSION['user']->uid, $_POST['formAnrede'], $_POST['formVorname'], $_POST['formNachname'], $_POST['formAdresse'], $_POST['formPLZ'], $_POST['formOrt'],$_POST['formEmail']);
                }
            }
        }
        
        # Get kundeninformationen
        $kund = $db->getKundenInfo($_SESSION['user']->uid);
        
        
        # POST aus Zahlung-erstellen-Formular bearbeiten
        if(!empty($_POST['newZahlung'])){
            if ($db->checkPW($_SESSION['user']->username, $_POST['formPasswort'])!= 1){
                echo "<script type='text/javascript'>alert('Falsches Passwort!')</script>";
            } else {
                if($_POST['formZahlungsart'] != "invalid" && !empty($_POST['formZahlungsdet'])){
                $db ->insertZahlungsinfo($kund->kid, $_POST['formZahlungsart'], $_POST['formZahlungsdet']);
                }
            }
        }


        #var_dump($_POST);

  ?>  
       
    
 
<div class="container"> 
    <h1> Mein Konto </h1>
    <div class="col-md-12">
        <div class="col-sm-6"id="changekundeArea">

            <form class="form-horizontal" action="" method="post" name="updateForm" id="updateForm">

                <h4 class="col-sm-offset-4 col-sm-8"> Anschrift </h4>

                <div class="form-group">
                  <label for="Anrede" class="col-sm-4 control-label">Anrede</label>
                  <div class="col-sm-8"> 
                    <select name="formAnrede" class="form-control" id="Anrede">
                      <!--check valid values for dropdown-->
                      <option value="Herr" <?php if($kund->anrede == 'Herr') echo 'selected="selected"';?> >Herr </option>
                      <option value="Frau" <?php if($kund->anrede == 'Frau') echo 'selected="selected"';?> >Frau </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Vorname" class="col-sm-4 control-label">Vorname</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="Vorname" name="formVorname" value="<?=$kund->vorname?>">
                  </div>
                </div>

               <div class="form-group">
                  <label for="Nachname" class="col-sm-4 control-label">Nachname</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Nachname" name="formNachname" value="<?=$kund->nachname?>">
                  </div>
                </div>

               <div class="form-group">
                  <label for="Adresse" class="col-sm-4 control-label">Adresse</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Adresse" name="formAdresse" value="<?=$kund->adresse?>">
                  </div>
                </div>

               <div class="form-group">
                  <label for="PLZ" class="col-sm-4 control-label">PLZ</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PLZ" name="formPLZ" value="<?=$kund->plz?>">
                  </div>
                </div>

               <div class="form-group">
                  <label for="Ort" class="col-sm-4 control-label">Ort</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Ort" name="formOrt" value="<?=$kund->ort?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="Email"  name="formEmail" value="<?=$kund->email?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="passwort1" class="col-sm-4 control-label">Passwortbestätigung</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwort1" name="formPasswort">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" class="btn btn-default" name="ChangeKunde" value="KundenUpdate">Kundendaten ändern</button>
                  </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6"id="changeZahlungsArea">

            <h4> Zahlungsinformationen </h4>
            <h5> Bekannte Zahlungsmethoden: </h5>

            <ul>
                <?php
                    $db->printZahlungsOption2($kund->kid)
                ?>
            </ul>
            <p></p>

            <form class="form-horizontal" action="" method="post" name="registerForm" id="registerForm">

                <h5> neue Zahlungsinformationen  erstellen:</h5>

                <div class="form-group">
                  <label for="Art" class="col-sm-3 control-label">Zahlungsart</label>
                  <div class="col-sm-9"> 
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
                  <label for="Zahlungsdet" class="col-sm-3 control-label">Zahlungsdetails</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="Zahlungsdet" name="formZahlungsdet" placeholder="IBAN, Kreditkartennummer, etc.">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="passwort1" class="col-sm-4 control-label">Passwort</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwort1" name="formPasswort">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-8">
                      <button type="submit" class="btn btn-default" name="newZahlung" value="newZahlung"> Zahlungsmethode eintragen</button>
                  </div>
                </div>
            </form>

        </div>
  </div>
    <div class="col-md-12">

    
    <div class="col-md-6" >
        <h1> Bestellliste </h1>

        <?php  
        # Bestellliste anzeigen
            $db->printBestellListe($_SESSION['user']->uid);

          ?>
            </div>
            <div class="col-md-6" >
                <h1> Bestelldetails </h1>

        <?php    
        # Bestelldetails anzeigen
        if(empty($_POST['wdetails'])){
            echo 'Keine Bestellung ausgewählt';
        } else {
            $db->printBestellDetails($_POST['wdetails']);

        }

          ?>
     

    
    </div>
</div>
</div>




