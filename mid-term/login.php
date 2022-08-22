<?php
    session_start();
    require "controller/user.controller.php";

    if(isset($_SESSION['username'])){
        header("Location: index.php");
    }



    $usernameErr = $passwordErr= "";
    $username = $password = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
        }
        if(isset($_COOKIE['password'])) {
            $password = $_COOKIE['password'];
        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            $usernameErr = "username is required";
        }else{
            $username = test_input($_POST["username"]);
        }

        if(empty($_POST["password"])){
            $passwordErr = "Password is required";
        }else{
            $password = test_input($_POST["password"]);
        }

        if(empty($nameErr) && empty($passwordErr)){
            if(login_user($username,$password)){
                if(isset($_POST['remember_me'])){
                    setcookie("username", $username, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                }
                header("Location: index.php");
            }else{
                $passwordErr = "Invalid username or password";
            }
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css"
        integrity="sha256-o+AsfCHj7A1M5Xgm1kJmZiGEIvMQEzQqrXz2072Gkkg=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>

    <?php
            include 'navbar.php';
        ?>

    <main class="container">
        <h1>Login</h1>

        <form action="/login.php" method="post">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="username" placeholder="Enter username"
                    value="<?php echo $username; ?>">
                <small class="text-danger"><?php echo $usernameErr; ?></small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                    value="<?php echo $password; ?>">

                <small class="text-danger"><?php echo $passwordErr; ?></small>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                <label class="form-check-label" for="remember_me">Remember me?</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>

</html>