<?php
if (isset($_SESSION['user']) && ($_SESSION['user']->rolle != "admin")) {
    # Waenkorb zählen
    $count=0;
    foreach ($_SESSION['cart'] as $produkt){
        echo $produkt['pid'].":".$produkt['anz'];
        $count += $produkt['anz'];        
    }        
    
    
    
    # ausgeben

       echo '<li> ' 
            . '<div> '
               . '<img src ="res\img\cart.png" alt="CART" style="width: 45px; height: 45px; padding: 5px;" >'
               . '<span>'.$count.'</span> '
            . '</div>'
            .'</li>';
    }
