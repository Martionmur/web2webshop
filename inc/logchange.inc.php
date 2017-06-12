<?php
# Bearbeitet Operation die nach Prüfung von Eingaben zu einer anderen Site wechseln

#Login postet logUsername und das wird in User.class.php geprüft
#var_dump($_POST);
if(!empty($_POST['logUsername'])){
    $success = $_SESSION['user']->checkLogin();
    # var_dump($success);
    if ($success){
        $_GET['tab']='home';
    }
}
# check register
if(!empty($_POST['fromSubmit'])){
    $success = $_SESSION['user']->checkRegister();
    # var_dump($success);
    if ($success){
        $_GET['tab']='login';
    }
}

# check rechnung
if(!empty($_POST['rechnung'])){
    $_GET['tab']='rechnung';
    }
    
# logout
if (isset($_GET['tab']) && $_GET['tab'] == 'logout' ) {
    $success = $_SESSION['user']->logout();
    # var_dump($success);
    if ($success){
        $_GET['tab']='home';
    }
}

# Bestellung abschicken (führt auch zu einer Umleitung

      
if (!empty($_POST['zahlung']) && $_SESSION['sum'] > 0 && isset($_SESSION['kid'])) { # gibt es überhaupt etwas zu zahlen
    
        $db = new newDB();
        $db->doConnect(); 
           
    if ($_SESSION['gesamt'] > 0 && $_POST['zahlung'] == "invalid"){   
        echo "<script type='text/javascript'>alert('Bitte Zahlungsmethode auswählen!')</script>"; # zahlungs methode nicht ausgewählt oder zuwenig gutschein eingelöst
    } else {
        # autocommit ausschalten;    
        $db->startBestellung();
        # insert Bestellung ohne Gutschein
        if (empty($_SESSION['gutschein'])){
            $bvalid = $db->insertBestellungOhneGutschein($_SESSION['kid'], $_POST['zahlung']);
        } else {
            $g_entwertung = $_SESSION['gutschein']->wert - $_SESSION['restguthaben'];        
            $bvalid = $db->insertBestellung($_SESSION['kid'], $_POST['zahlung'], $_SESSION['gutschein']->gid, $g_entwertung);       
        }
        
        # Bestellid:
        if($bvalid){ 
            $bid = $db->getLastBestellungsID();
            #echo "</br> Bid:". $bid ."<br>";
        }
        
        # insert cart into b_has_p & validate Gutschein
        if(!empty($bid)){
            $bvalid = $db->insertCart($_SESSION['cart'], $bid);          
            #echo "</br> insert cart:". $bvalid ."<br>";
        
            if (!empty($_SESSION['gutschein'])){    
                $bvalid = $db->updateGutschein($_SESSION['gutschein']->gid, $_SESSION['restguthaben']);          
             #   echo "</br> GutscheinUpdate:". $bvalid ."<br>";
            }
        }
        
        # Abschluss: Commit, Erfolgs-Alert, Session Drop und Umleitung zu Home 
        if($bvalid){
            $db->commitBestellung();
            unset($_SESSION['kid']);
            unset($_SESSION['sum']);
            unset($_SESSION['gesamt']);
            unset($_SESSION['restguthaben']);
            $_GET['tab']='home';           
            
        }
        
        $db->endBestellung();
    }
}                       
# bestellung abschicken
# check Zahlungsinfo if Rechnungsbetrag != 0;
    # OK SQL Data: bestellung - kid, zid, gid, gutscheinentwertung
    # OK get bid
    # OK SQL Data: Gutschein - gid, wert = restbetrag, validieren
    # OK SQL Data: b_has_p - bid, for each cart
    # ?SQL Data: produkte - lagerbestand -1
    # if all works COMMIT - how?

#? Kunden rabattgruppe für FST?
         
        
  ?> 
