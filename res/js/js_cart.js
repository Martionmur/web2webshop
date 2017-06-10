function add_to_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id},     
        success: function(){
            x=document.getElementById('cart_cnt').innerHTML;
            x=x+1;
            document.getElementById('cart_cnt').innerHTML = x;
        }
                   //warenkorb anzeige ändern
                 
        
        })
        
    }