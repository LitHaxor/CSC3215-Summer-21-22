<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login | Page</title>

    <?php 
      $usernameErr = $passwordErr = "";
      $username = $password = "";
      if(isset($_POST)) {
        if(!isset($_POST['username'])) {
          $usernameErr = "username must not be empty";
        } else {
          $username = $_POST['username'];
          $usernameErr = "";
        }
        
        
        if(!isset($_POST['password'])) {
          $passwordErr = "Password should not be empty!";
        } else {
          $password = $_POST["password"];
        }
      }
    ?>
</head>

<body>
    <?php 
        include "./navbars/navbar.php";
        include "./controller/user.controller.php";

        $loginErr = "";

        if(isset($_POST)) {
            if(loginUser($username, $password)) {
                // header('Location: ./index.php');
            } else {
                $loginErr=  "Login Failed!";
            }
        }
    ?>
    <div>
        <h2 class="text-3xl m-10">Login</h2>
    </div>

    <div>
        <form class="m-10 w-full max-w-sm" method="post">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                        name="email" type="text" placeholder="jon@email.com" />
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                        id="inline-password" type="password" name="password" placeholder="******************" />
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3"></div>
                <label class="md:w-2/3 block text-gray-500 font-bold">
                    <a class="text-blue-400" href="forget.php"> Forget Password? </a>
                </label>
            </div>


            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3"></div>
                <label class="md:w-2/3 block text-gray-500 font-bold">
                    <input class="mr-2 leading-tight" type="checkbox" name="remember_me" />
                    <span class="text-sm"> Remember Me? </span>
                </label>

            </div>

            <div class="flex items-center">
                <div class="w-1/3"></div>
                <div class="w-2/3">
                    <input class="shadow bg-purple-500 hover:bg-purple-400  text-white font-bold py-2 px-4 rounded"
                        type="submit">
                    </input>
                </div>
            </div>
        </form>
    </div>
</body>
<?php 
      include "./footer/footer.php"
    ?>

</html>