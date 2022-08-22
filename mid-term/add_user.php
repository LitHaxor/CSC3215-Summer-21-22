<?php
    session_start();
    require "controller/user.controller.php";

    $username = $email =$name = $password = $confirm_password = $gender = $dob ="";
    $usernameErr = $passwordErr = $emailErr =  $genderErr = $dobErr = $registerErr = "";

    $is_update = false;


    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['username'])) {
            $username = $_GET['username'];
            $user = get_user($username);
            $is_update = true;
        }

        if(isset($user)) {
            $username = $user['username'];
            $email = $user['email'];
            $name = $user['name'];
            $dob = $user['dob'];
            $gender = $user['gender'];
        }

        if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
            $username = $_GET['username'];
            delete_user($username);
            header("Location: users.php");
        } 
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            $usernameErr = "username is required";
        }else if(!preg_match("/^[a-zA-Z]*$/", $username)){
                $usernameErr = "Only letters and no white space allowed";
        } else {
            $username = test_input($_POST["username"]);
        }

        if(empty($_POST["name"])){
            $nameErr = "username is required";
        }else if(!preg_match("/^[a-zA-Z]*$/", $name)){
            $nameErr = "Only letters and no white space allowed";
        } else {
            $name = test_input($_POST["name"]);
        }


        if(empty($_POST["email"])) {
            $emailErr = "email is required";
        } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = test_input($_POST["email"]);
        }


        if(empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else if(strlen($_POST["password"]) < 6) {
            $passwordErr = "password must be at least 6 characters";
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST['confirm_password'])) {
            $confirm_passwordErr = "confirm password is required";
        } else if($_POST['password'] != $_POST['confirm_password']) {
            $confirm_passwordErr = "password does not match";
        } else {
            $confirm_password = test_input($_POST['confirm_password']);
        }

        if (empty($_POST['dob'])) {
            $dobErr = "dob is required";
        } else {
            $dob = test_input($_POST['dob']);
        }


        if (empty($gender)) {
            $genderErr = "gender is required";
        } else {
            $gender = test_input($_POST['gender']);
        }



        if(empty($usernameErr) && empty($passwordErr) && empty($nameErr) && empty($emailErr)) {
            if(register_user($username, $email, $password, $dob, $gender, $name)){
                header("Location: users.php");
            }else {
                $registerErr = "User Already exists!";
            }
        }

    }




    function test_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    function show_error($error): void
    {
        echo "<div class='alert alert-primary' role='alert'>$error</div>";
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
    <title>ECMS | Register</title>
</head>

<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="row" style="height: 100vh">
        <?php
            include 'side_nav.php';
        ?>

        <div class="col-10">
            <div class="container mt-5">
                <h1>Add User</h1>
                <?php
                if(!empty($registerErr)){
                    show_error($registerErr);
                }
                ?>
                <form action="/add_user.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter username" value="<?php echo $username; ?>">
                        <small class="text-danger"><?php echo $usernameErr; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                            value="<?php echo $username; ?>">
                        <small class="text-danger"><?php echo $usernameErr; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                            value="<?php echo $email; ?>">
                        <small class="text-danger"><?php echo $emailErr; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password">
                        <small class="text-danger"><?php echo $passwordErr; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Confirm password">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth"
                            value="<?php echo $dob; ?>">
                        <small class="text-danger"><?php echo $dobErr; ?></small>
                    </div>

                    <div>
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="male"> male
                        <input type="radio" name="gender" value="female"> female
                    </div>


                    <button type="submit" class="mt-2 btn btn-primary" value="Register">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>