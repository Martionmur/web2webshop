<?php
#check $_POST 
#check if gutschein code ist already in use (warenkorb) and insert ->alert

$db = new newDB();
$db->doConnect();
if(!empty($_POST)){
    if(!empty($_POST['gwert']) && (!empty($_POST['ablaufdatum']))){

        if($db->getGutschein($_POST['gcode'])->gid == -1){
            $done = $db->insertGutschein($_POST['gcode'], $_POST['gwert'], $_POST['ablaufdatum']);
            if($done){
                echo "<script type='text/javascript'>alert('Der Gutschein eingefügt.')</script>";
            } else{
                echo "<script type='text/javascript'>alert('Fehler beim Gutschein einfügen.')</script>";
            }   
        } else {
            echo "<script type='text/javascript'>alert('Gutscheincode bereits vorhanden.')</script>";
        }          
    } else {
        echo "<script type='text/javascript'>alert('Bitte Felder ausfüllen.')</script>";
    }
}

$adate = date("Y-m-d");
$adate = date('Y-m-d', strtotime($adate. ' + 1 years'));

#make Placeholder values for gutschein und code
function generateCode() {
    $length = 5;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

# Formularanzeige
?> 



<div class="container">
        <h1>Gutschein verwalten</h1>
        <div id= 'Gutscheinerstellung' class='col-md-6'>
        <form class="form-horizontal" action="" method="post" name="GutscheinBau" id="loginForm">
       
          <div class="form-group">
            <label for="Gcode" class="col-sm-4 control-label">Gutscheincode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Gcode" name="gcode" value ="<?php echo generateCode()?> " pattern="[A-Za-z0-9]{5Post}" title="Der Code ist fünf Zeichenlang und besteht aus Buchstaben und Zahlen.">
            </div>
          </div>
          <div class="form-group">
            <label for="GWert" class="col-sm-4 control-label">Wert</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="GWert" name="gwert" value ="20">
            </div>
          </div>

          <div class="form-group">
            <label for="Ablaufdatum" class="col-sm-4 control-label">Ablaufdatum</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="Ablaufdatum" name="ablaufdatum" value ="<?php echo $adate?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default" name="MakeGut" value="MakeGut">Gutschein erstellen</button>
            </div>
          </div>
        </form>
        </div>
        <div id= 'Gutscheinansicht' class='col-md-6'> 
<?php

        $db->printGutscheinliste();
?>  
        </div>       
    
 




