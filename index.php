<?php
    session_start();
    $_SESSION["user"]= "kunde";
    include ("utility/DB.class.php");
?>
<!DOCTYPE html>


<html>
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/custom.css" rel="stylesheet" type="text/css" />
        <!-- BOOTSRAP Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <?php
            include("inc/navigation.php");
        ?>
        

    </head>
    <body>

        <div id="content">
            <?php
                include ("sites/produkte.php");
            ?>
        </div>
        
    </body>
</html>
