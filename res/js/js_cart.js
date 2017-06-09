function add_to_cart(id){
    $.ajax({
        type: "POST",       
        url: "ajax/ProduktzuWarenkorb.php",
        data: {id: id}     
        //success: success,
                   //warenkorb anzeige ändern
                 
               })
        
    }