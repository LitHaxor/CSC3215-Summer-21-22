<?php

    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/user.model.php');

    function login_user( $username, $password){
        $user = get_user($username);

        if($user){
            if(password_verify($password,$user['password'])){
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }

        return false;
    }



    function update_user($username, $email, $password, $dob, $name, $gender) {
        store_update_user($username, $email, $password, $dob, $name, $gender);
    }

    function register_user($username,$email, $password, $dob, $gender, $name ){
        $user = get_user($username);

        if($user){
            return false;
        }

        $password = password_hash($password,PASSWORD_DEFAULT);
        $user = create_user($username, $password, $dob, $gender, $email, $name);

        if($user){
            $_SESSION['username'] = $username;
            return true;
        }

        return false;
    }

    function get_users(){
        return load_user();
    }

?>