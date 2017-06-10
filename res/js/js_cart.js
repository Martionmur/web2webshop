function add_to_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id},     
        success: function(){
            //Aktualisiert die Anzahl der Produkte ohne Neuladen der Seite
            x=document.getElementById('cart_cnt').innerHTML;
            x++;
            document.getElementById('cart_cnt').innerHTML = x;
            
            y=document.getElementById('cart'+id).innerHTML; 
            y++;
            
            document.getElementById('cart'+id).innerHTML=y;
            
        }
                   //warenkorb anzeige ändern
                 
        
        })
        
    }