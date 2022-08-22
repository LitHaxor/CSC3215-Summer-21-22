<?php

    require_once (__DIR__ . '/controller/user.controller.php');

    session_start();


    $userController = new UserController();

    $username = $password = '';

    $usernameErr = $passwordErr = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!isset($_POST['username'])) {
            $usernameErr = "Please enter username";
        }

        if(!isset($_POST['password'])) {
            $passwordErr = "Please enter password";
        }

        $username = $_POST['username'];
        $password = $_POST['password'];


        if(!isset($usernameErr) && !isset($passwordErr)) {
            $isOk = $userController->loginUser($username, $password);

            if($isOk) {
                header('Location: index.php');
            }
        }
    }
 ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <h2>Please Login</h2>

    <div>
        <form method="post">

            <div>
                <label>
                    Username
                    <input name="username" type="text" />
                </label>
            </div>

            <div>
                <label>
                    Password
                    <input name="password" type="text" />
                </label>
            </div>

            <button type="submit">
                submit
            </button>


        </form>
    </div>
</body>
</html>