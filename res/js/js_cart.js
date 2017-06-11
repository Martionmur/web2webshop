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
            //cnt=document.getElementById('cart'+id).innerHTML;
            
           // if(cnt<=1){
            //    var element = document.getElementById('rowid'+id);
            //    element.parentNode.removeChild(element);
            //}
           // else{
             //   x=cnt;
             //   x--;
            //    document.getElementById('cart'+id).innerHTML=x;
           // }
           location.reload();

            //summe aktualisieren
            //Cart Status aktualisieren
            //z=document.getElementById('cart_cnt').innerHTML;
            //z--;
            //document.getElementById('cart_cnt').innerHTML = x;
        }    
    })
}



//Funktion für Warenkorb (inklusive Refresh)
function add_to_cart_w(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id},     
        success: function(){
            //Countern in CartStatus
            //x=document.getElementById('cart_cnt').innerHTML;
            //x++;
            //document.getElementById('cart_cnt').innerHTML = x;
            
            location.reload();
            
            //Counter in Warenkorb-Table
            //y=document.getElementById('cart'+id).innerHTML; 
            //y++;
            //document.getElementById('cart'+id).innerHTML=y;
            
            //Gesamtpreis in Warenkorb-Table
            //p=Number(document.getElementById('price'+id).getAttribute("value"));
            //n=y*p;
            //document.getElementById('sum'+id).innerHTML=n.toFixed(2)+' €';            
            
            
            //Summe unter Warenkorb-Table aktualisieren
            //ns=ns+p;
           
        }               
    })
        
}