<?php
        $db = new newDB();
        $db->doConnect();           
        
  ?>    
<div id="Katauswahl" class="col-md-2 thumbnail">
    <h4> Kategorienauswahl </h4>
    <form class="form-horizontal" action="" method="post" name="Katradio" id="Katradio">
        <div>
            <input type="radio" name="kat" value="Alles" checked> Alles<br>
            <?php
                $db->printKatlist();
            
            ?>
        </div>
        <div>
            <button type="submit" class="btn btn-default" name="Katsubmit">Filtern</button>
        </div>

    </form>
    
</div>



<div id="Produktanzeige" class="col-md-10">
    <?php
    #var_dump($_POST);
    if(!isset($_POST['kat'])){
        $db->printProduktliste('Alles');
    } else {
        $db->printProduktliste($_POST['kat']);
    }
    ?>  
</div>


    
 




