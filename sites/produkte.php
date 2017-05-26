<?php
        $db = new DB();
        $db->doConnect();
        $ProdukteKonkret = new ProduktListe(); ### Ich blick nicht mehr durch ob ich das brauch       
        $ProdukteKonkret = $db->getProduktListe();
        
        foreach ($ProdukteKonkret ->PL as $Produkt){
            
        }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

