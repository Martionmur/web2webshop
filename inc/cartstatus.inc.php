<?php
# Setzt Cart Symbol in Navbar mit Produktanzahl
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];    
    }
if (isset($_SESSION['user']) && ($_SESSION['user']->rolle != "admin")) {
    # Waenkorb zählen
    $count=0;
    foreach ($_SESSION['cart'] as $produkt){
        #echo $produkt['pid'].":".$produkt['anz'];
        $count += $produkt['anz'];        
    }        
    
    
    
    # ausgeben

       echo '<li> ' 
            . '<div id="cart" style=" padding-right: 5px;" class="ui-widget-header">'
               . '<img src ="res\img\cart.png" alt="CART" style="width: 45px; height: 45px; padding: 5px;" >'
               . '<span id="cart_cnt">  '.$count.'  </span> '
            . '</div>'
            .'</li>';
    }
