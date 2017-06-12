<?php
class User {
    public $uid = null;
    public $username = null;
    public $rolle = null;
    

    function checkLogin(){
        $success= 0;
        #prüft Username und setzt Userstatus

## check input
### User vorhanden 
### PW corr^ect

## Login -> Uid, name, rolle into session via class
### Checkbox is set send cookie


        
            if(    !isset($_POST['logUsername'])    || $_POST['logUsername'] == ""
                || !isset($_POST['logPasswort'])    || $_POST['logPasswort'] == ""){
                    echo "<script type='text/javascript'>alert('Bitte Username und Passwort ausfüllen.')</script>";
            } else {
                #echo "username and PW :".$_POST['logUsername']." + ".$_POST['logPasswort']; 
                $db = new newDB();
                $db->doConnect();
                #echo "<br> connect: ".var_dump($db);
                #echo "<br> countuser: ".$db->countUserCheck($_POST['logUsername']);
                if ($db->countUserCheck($_POST['logUsername'])!= 1){
                    echo "<script type='text/javascript'>alert('Bitte überprüfen Sie den Username')</script>";
                } else {    
                #   echo "<br> checkPQ:".$db->checkPW($_POST['logUsername'], $_POST['logPasswort']);
                    if ($db->checkPW($_POST['logUsername'], $_POST['logPasswort'])!= 1){

                    echo "<script type='text/javascript'>alert('Falsches Passwort!')</script>";

                    } else { 
                #        echo "<script type='text/javascript'>alert('Richtiges Passwort!')</script>";

                        $user = $db->makeUser($_POST['logUsername'], $_POST['logPasswort']) ;
                        $_SESSION['user'] = $user ; ## Wie zuweisen? Richtiges Objekt?  
                #        echo $_SESSION['user']->rolle;

                        echo "<script type='text/javascript'> alert('Sie sind als ". $_SESSION['user']->username ." angemeldet. Willkommen!')</script>";


                        if (!empty($_SESSION['logRemember'])){
                             setcookie('user' ,$user, time()+86400);
                        }
                        $success= 1;
                    }
                }
            }
            return $success;
    }
    
    
    function checkregister(){
        
## Validate form values from form <- form 'action = ""' so data is send to site itself again
    $valid = true;
    $success = false;
    #sind alle Daten eingegeben?
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
    
    # wenn alles passt insert Schrittweise
        if ($valid == true) {
            $db = new newDB();
            $db->doConnect();
    
    
            if($db->insertUser($_POST['formUsername'], md5($_POST['formPasswort1']))) {
            #    echo "User wurde angelegt";
                $success = TRUE;
            } else {
            #    echo "User konnte nicht angelegt werden";
                $success = FALSE;
            }
        
            $uid =$db->getUserID($_POST['formUsername']);       
            #echo"GetUserID: ";
            #var_dump($uid);
            if($db->insertKunde("$uid", $_POST['formAnrede'], $_POST['formVorname'], $_POST['formNachname'], $_POST['formAdresse'], $_POST['formPLZ'], $_POST['formOrt'],"Österreich", $_POST['formEmail'])){
            #    echo "kunde angelegt";
                $success = TRUE;
            } else {
            #    echo "Kunde wurde nicht angelegt";
                $success = FALSE;
            }
        
            $kid =$db->getKundenID($uid);       
            #echo "GEt KundenID: ";
            #var_dump($kid);
            
            if($db->insertZahlungsinfo($kid, $_POST['formZahlungsart'], $_POST['formZahlungsdet'])) {
            #    echo "Zahlungsinfo angelegt" ;
                $success = TRUE;
                
            }else{
            #    echo "Zahlungsinfo nicht angelegt.";
                $success = FALSE;
            }
            if($success){
                echo "<script type='text/javascript'>alert('Registrierung erfolgreich')</script>";
            }
            return $success;
            ### Erfolg! Go to LogIn after Registration
            ### DisconnectDB
        }
    }
    
    
    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['gutschein']);
        echo "<script type='text/javascript'>alert('Sie sind jetzt abgemeldet')</script>";
        #Zum Löschen des Cookie wird er neu initialisiert und die Minimale Lebensdauer vergeben
        setcookie('user',NULL,1);
        return 1;
    }

    
}

