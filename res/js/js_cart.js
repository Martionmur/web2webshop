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
            
            //summe aktualisieren
            
        }               
    })
        
}
    
    
function take_from_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktvonWarenkorb.php",
        data: {id: id},     
        success: function(){
            cnt=document.getElementById('cart'+id).innerHTML;
            
            if(cnt<=1){
                var element = document.getElementById('rowid'+id);
                element.parentNode.removeChild(element);
            }
            else{
                x=cnt;
                x--;
                document.getElementById('cart'+id).innerHTML=x;
            }
            
            //summe aktualisieren
            //Cart Status aktualisieren
            z=document.getElementById('cart_cnt').innerHTML;
            z--;
            document.getElementById('cart_cnt').innerHTML = x;
        }    
    })
}