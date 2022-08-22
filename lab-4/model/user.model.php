<?php 

    function loadUsers() {
        if(file_exists("../data/data.json")) {
            $file = file_get_contents('../data/data.json');  
            return json_decode($file, true); 
        } 
    }

    function storeUser($users) {
        if(file_exists("../data/data.json")) {
            $file = file_get_contents('../data/data.json'); 
            if(file_put_contents('../data/data.json', json_encode($users))) {
                return true;
            } else {
                return false;
            }
        }
    }

?>