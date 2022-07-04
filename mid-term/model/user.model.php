<?php
    function load_user() {
        if(file_exists(__DIR__ . '/../data/user.json')){
            return json_decode(file_get_contents(__DIR__ . '/../data/user.json'), true);
        }
    }

    function save_user($user) {
        $users = load_user();
        $users[] = $user;
        return file_put_contents(__DIR__ . '/../data/user.json', json_encode($users));
    }


    function get_user($username) {
        $users = load_user();
        foreach($users as $user){
            if($user['username'] == $username){
                return $user;
            }
        }
        return false;
    }

    function store_update_user($username, $email, $password, $dob, $name, $gender, $image=null)
    {
        $users = load_user();
        foreach($users as $key => $user){
            if($user['username'] == $username){
                $users[$key]['username'] = $username;
                $users[$key]['email'] = $email;
                $users[$key]['password'] = hash('sha256', $password);
                $users[$key]['image'] = $image;
                $users[$key]['gender'] = $gender;
                $users[$key]['dob'] = $dob;
                $users[$key]['name'] = $name;
            }
        }
        return file_put_contents(__DIR__ . '/../data/user.json', json_encode($users));
    }


    function create_user($username,$password, $dob, $gender, $email, $name): bool{
        $user = array(
            "username" => $username,
            "password" => $password,
            "dob"      => $dob,
            "gender"   => $gender,
            "email"    => $email,
            "name"     => $name,
            "type"     => "User",
            "createdAt" => Date()
        );

        return save_user($user);
    }

?>
