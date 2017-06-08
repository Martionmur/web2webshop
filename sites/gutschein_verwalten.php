<?php
#check $_POST 
#           check if code ist already in use (warenkorb) and insert ->alert
#make Placeholder values for gutschein und code


        $db = new newDB();
        $db->doConnect();

?> 



<div class="container">
        <h1>Gutschein verwalten</h1>
        <div id= 'Gutscheinerstellung' class='col-md-6'>
        <form class="form-horizontal" action="" method="post" name="GutscheinBau" id="loginForm">
       
          <div class="form-group">
            <label for="Gcode" class="col-sm-4 control-label">Gutscheincode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Gcode" name="gcode" pattern="[A-Za-z0-9]{5}" title="Der Code ist fünf Zeichenlang und besteht aus Buchstaben und Zahlen.">
            </div>
          </div>

          <div class="form-group">
            <label for="Ablaufdatum" class="col-sm-4 control-label">Ablaufdatum</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="Ablaufdatum" name="ablaufd">
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
        $db = new newDB();
        $db->doConnect();
        $db->printGutscheinliste();
?>  
        </div>       
    
 




