<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $db = new newDB();
        $db->doConnect();
                
        if ($db->countUserCheck("testuser")) {
            echo "<script type='text/javascript'>alert('Username bereits vergeben.')</script>";
        }
        else {
        if($db->insertUser("testimann", "testimannpw")) echo "hat gepasst";
        else echo"hat nicht gepasst";
        #$db->commit;
        }
        
