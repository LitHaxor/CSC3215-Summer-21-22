<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Login Page</title>
</head>


<?php 

  $username = $password = "";

  $userNameErr = $passwordErr = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($username)) {
      $username = $_POST['username'];
    } else if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
      $userNameErr = "Username can only contain letters, numbers, and underscores.";
     } else {
      $userNameErr = "Please enter valid username!";
    }
    if(isset($password)) {
      $password = $_POST['password'];
    } else {
      $passwordErr = "Password should be not empty!";
    }

    if(isset($username) || isset($password) && file_exists('./data/data.json')) {
      $file = file_get_contents('./data/data.json');
      $users = json_decode($file, true);
      $user = array_search($username, array_column($users, 'username'));
      if($user) {
        if($user['password'] == $password) {
          header('Location: ./index.php');
        } else {
          $passwordErr = "Password is incorrect!";
        }
      } else {
        $userNameErr = "Username is not registered!";
      }
    }

  }


?>

<body class="main-container">
    <h2>Please Login</h2>

    <form method="post">
        <div class="form">
            <label for="username" class="form-label">
                Username: <input type="text" name="username" id="username" />
            </label>
        </div>

        <div class="form">
            <label for="password">
                Password: <input type="password" name="password" />
            </label>
        </div>

        <div class="form">
            <label for="remember_me">
                <input name="remember_me" id="remember_me" type="checkbox" /> Remember
                me?
            </label>
        </div>

        <div class="center">
            <input class="button" type="submit" value="Login" />
        </div>
        <div class="center">
            <a href="registration.php" class="button" type="submit">
                Register
            </a>
        </div>
    </form>
</body>

</html>