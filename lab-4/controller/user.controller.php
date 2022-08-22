<?php 
    include "./model/user.model.php";
    function loginUser($username , $password)
    {

        $data = loadUsers();
        if(isset($username) && isset($password) && $data) {
            if($username == $data['username'] && $password == $data['password']) {
                return true;
            } else {
                return false;
            }
        }
    }

    function registerUser($req)
    {
        $name = $username = $password = $email  = $dob = "";
        
        $nameErr = $passwordErr = $usernameErr  = $emailErr = $dobErr = "";
        
        $success = true;

        if(isset($req)) {
            print_r($req);

            if(isset($req['name'])) {
                $name = $req['name'];
            } else {
                $nameErr = "please enter a valid name";
                $success = false;
            }

            if(isset($req['username']) ) {
                $username = $req['username'];   
            } else {
                $usernameErr = "please enter a valid name";
                $success = false;
            }

            if(isset($req['email']) && filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
                $email = $req['email'];
            } else {
                $emailErr  = "please enter a valid email";
                $success = false;
            }

            if(isset($req['password']) && isset($req['confirmPassword']) && $req['password'] == $req['confirmPassword'] && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $req['password'])) {
                $password = $req['password'];
            } else {
                $passwordErr  = "Please check your password!";
                $success = false;
            }

            if(isset($req['dob_day']) && isset($req['dob_month']) && isset($req['dob_year']) && checkdate($req['dob_month'], $req['dob_day'], $req['dob_year'])) {
                $dob = $req['dob_day'] . "-" . $req['dob_month'] . "-" . $req['dob_year'];
            } else {
                $dobErr  = "please enter a valid date of birth";
                $success = false;
            }

            if($success) {
                $data = loadUsers();
                if($data) {
                    $user = array(
                        "name" => $name,
                        "username" => $username,
                        "email" => $email,
                        "password" => $password,
                        "dob" => $dob
                    );
                    $data[] = $user;
                    $success = storeUser($data);
                } else {
                    $user = array();
                    $data['name'] = $name;
                    $data['username'] = $username;
                    $data['password'] = $password;
                    $data['email'] = $email;
                    $data['dob'] = $dob;
                   $success = storeUser($data);
                }
            }
        }
        
        return [$nameErr, $usernameErr, $emailErr, $passwordErr, $dobErr, $success];
    }
    

    

?>