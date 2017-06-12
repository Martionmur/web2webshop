<?php
        $db = new newDB();
        $db->doConnect();
        #var_dump($_SESSION); 
 ?>    
<div id="overall" class="col-md-12">
<div id="Katauswahl" class="col-md-1 thumbnail">
    <div id="suchdiv">
        <div class='form-group'>
            <input type='text' class='form-control' size='6' placeholder='Search' onkeyup="searchProd(this.value)">
        </div>
    </div>
    <h4> Kategorie </h4>
    <form class="form-horizontal" action="" method="post" name="Katradio" id="Katradio">
        <div>
            <input type="radio" name="kat" value="Alles" checked> Alles<br>
            <?php
                $db->printKatlist("");
            
            ?>
        </div>
        <div>
            <button type="submit" class="btn btn-default" name="Katsubmit">Filtern</button>
        </div>

    </form>
    
</div>

    <div id="sucheundprodukte" class="col-md-11">
    <div id="suchdiv">
        <form class='navbar-form navbar-left'>
                <div class='form-group'>
                    <input type='text' class='form-control' placeholder='Search' onkeyup="searchProd(this.value)">
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
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
</div>
</div>