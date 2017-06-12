//Übergibt Produkt-ID an ProduktzuWarenkorb.php & aktualisiert Anzahl der Produkte im Warenkorb
function add_to_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id},     
        success: function(){
            //Countern in CartStatus
            x=document.getElementById('cart_cnt').innerHTML;
            x++;
            document.getElementById('cart_cnt').innerHTML = x;
            
            }               
    })
        
}
    
    
function take_from_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktvonWarenkorb.php",
        data: {id: id},     
        success: function(){
           location.reload();
        }    
    })
}



//Funktion für Warenkorb -> aktualisiert Anzahl der Waren im Kart nicht -> dafür Page-Refresh
function add_to_cart_w(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id},     
        success: function(){
            location.reload();  
        }               
    })
        
}