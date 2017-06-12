
         
   <?php
        $db = new newDB();
        $db->doConnect();
         var_dump($_POST);
#Produkt löschen
        if(isset($_POST['deleteprod'])){
            $db-> deleteProdukt($_POST['deleteprod']);
        }

        
#abgeschickte Produktbearbeitung einfügen:
        if(isset($_POST['ProdSubmit'])){
            ##### Check Eingabe
            if(empty($_POST['bezeichnung']) || empty($_POST['preis']) || empty($_POST['bewertung']) || empty($_POST['kat']) ){
                echo "<script type='text/javascript'>alert('Bitte alle Felder ausfüllen!')</script>";
                $_POST['changeprod']=-1;
            } else {            
                $db-> insertupdateProdukt($_POST['PID'], $_POST['bezeichnung'], $_POST['preis'], $_POST['bewertung'], $_POST['kat']);
##### FIleupload nicht in POST!!!!!!
            }
        }
        
        
#Produkt bearbeiten
        if(!empty($_POST['changeprod'])){
    #Produktwerte holen (-1 ist ein neues produkt)
            if ($_POST['changeprod']!=-1){
                $prodinfo = $db->getproduktinfo($_POST['changeprod']);
                
                $prodinfotag = "ProduktID: ".$prodinfo->pid;
            } else { 
                $prodinfo = new Produkt("-1","","","","","");
                $prodinfotag = "Neues Produkt";
            }            
        
    #Produktinfo form
    echo '<div class="container">
     <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="ProduktForm" id="produktForm">
      <div class="form-group">
        <label for="PID" class="col-sm-4 control-label">'.$prodinfotag.'</label>
        <div class="col-sm-8">
          <input type="hidden" name="PID" value="'.$prodinfo->pid.'">
        </div>
      </div>

      <div class="form-group">
        <label for="Bezeichung" class="col-sm-4 control-label">Bezeichung</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Bezeichung" name="bezeichnung" value="'.$prodinfo->bezeichnung.'">
        </div>
      </div>
      <div class="form-group">
        <label for="Preis" class="col-sm-4 control-label">Preis</label>
        <div class="col-sm-8">
          <input type="number" step="0.01" class="form-control" id="Preis" name="preis" value="'.$prodinfo->preis.'">
        </div>
      </div>
      <div class="form-group">
        <label for="Bewertung" class="col-sm-4 control-label">Bewertung</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="Bewertung" name="bewertung" value="'.$prodinfo->bewertung.'">
        </div>
      </div>
      <div class="form-group">
        <label for="kat" class="col-sm-4 control-label">Katbezeichung</label>
        <div class="col-sm-8">';
    echo $db->printKatlist($prodinfo->kategorie);
    echo '</div> 

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default" name="ProdSubmit" value="">Produkt abschicken</button>
        </div>
      </div>
    </form>
  </div>';
            
    }


#Bild bearbeiten
        if(!empty($_POST['setPic'])){
    
        
    #BildUpload form
    echo '<div class="container">
     <form action="" method="post" enctype="multipart/form-data" name="PicForm" id="PicForm">
            <div class="form-group">
               <label for="Prodbild" class="col-sm-4 control-label">Produktbild</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
                <input type="file" accept="image/*" id="Prodbild" name="Prodbild">
            </div>    

            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-default" name="PicSubmit" value="">Bild hochladen</button>
              </div>
            </div>
    </form>
  </div>';
            
    }
//    <form method="post" action="" style="width:130px;" enctype="multipart/form-data">

//      Neues Bild:<p><input name="userfile" type="file" size="10" style="width:100px;"></p>
//      <input type="submit" value="Upload">
//	</form>

      
    ?>

          
<?php        
        $db->printProduktliste_admin();       
?>  
       
    
