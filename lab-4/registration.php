<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registation | Page</title>
</head>

<body>
    <?php 
      include "./navbars/navbar.php";
      require "./controller/user.controller.php";


      if($_SERVER['REQUEST_METHOD'] == "POST") {
        registerUser($_POST);
      }

      if($success) {
        echo '<div class="border rounded-sm p-2 border-green-500 bg-green-700 text-white">Registration successfull</div>';
      } else {
        echo '<div class="border rounded-sm p-2 border-red-500 bg-red-700 text-white">Registration Failed!</div>';
      }
      
    ?>
    <div>
        <h2 class="text-3xl m-10">Registation</h2>
    </div>
    <div class="w-screen flex justify-center">

        <form class="w-full max-w-lg mb-5 pb-5 shadow-md p-5 rounded-md" method="POST">
            <h2 class="text-2xl text-bold mb-2 text-blue-400">Please enter you details</h2>
            <div class="flex flex-col ">
                <div class="flex  items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right pr-4" for="inline-full-name">
                            Name
                        </label>
                    </div>

                    <div class="flex flex-col items-right md:w-2/3">

                        <?php 
                            if(isset($nameErr)) {
                                echo '<input class="bg-red-50 appearance-none border-2 border-red-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="name" type="text" placeholder="jon doe" />';
                                 echo "<div class='text-red-500'>$nameErr</div>";
                            } else {
                                echo '<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="name" type="text" placeholder="jon doe" />';
                            } 
                        ?>
                    </div>

                </div>

            </div>



            <div class="flex flex-col ">
                <div class="flex  items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right pr-4" for="inline-full-name">
                            Email
                        </label>
                    </div>

                    <div class="flex flex-col items-right md:w-2/3">

                        <?php 
                             
                            if(isset($emailErr)) {
                                echo '<input class="bg-red-50 appearance-none border-2 border-red-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="email" type="text" placeholder="jon doe" />';
                                echo "<div class='text-red-500'>$emailErr</div>";
                            } else {
                                echo '<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="name" type="text" placeholder="jon doe" />`;
                            } 
                        ?>
                    </div>

                </div>

            </div>

            <div class="flex flex-col ">
                <div class="flex  items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right pr-4" for="inline-full-name">
                            username
                        </label>
                    </div>

                    <div class="flex flex-col items-right md:w-2/3">

                        <?php 
                             
                            if(isset($usernameErr)) {
                                echo '<input class="bg-red-50 appearance-none border-2 border-red-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="username" type="text" placeholder="joe" />';
                                echo "<div class='text-red-500'>$usernameErr</div>";
                            } else {
                                echo `<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="username" type="text" placeholder="jon doe" />`;
                            } 
                        ?>
                    </div>

                </div>

            </div>



            <div class="flex flex-col ">
                <div class="flex  items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right pr-4" for="inline-full-name">
                            password
                        </label>
                    </div>

                    <div class="flex flex-col items-right md:w-2/3">

                        <?php 
                             
                            if(isset($passwordErr)) {
                                echo '<input class="bg-red-50 appearance-none border-2 border-red-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="email" type="text" placeholder="jon doe" />';
                                echo "<div class='text-red-500'>$passwordErr</div>";
                            } else {
                                echo `<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="name" type="text" placeholder="jon doe" />`;
                            } 
                        ?>
                    </div>

                </div>

            </div>


            <div class="flex flex-col ">
                <div class="flex  items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right pr-4" for="inline-full-name">
                            Confirm password
                        </label>
                    </div>

                    <div class="flex flex-col items-right md:w-2/3">

                        <?php 
                             
                            if(isset($passwordErr)) {
                                echo '<input class="bg-red-50 appearance-none border-2 border-red-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="email" type="text" placeholder="jon doe" />';
                                echo "<div class='text-red-500'>$passwordErr</div>";
                            } else {
                                echo `<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" name="name" type="text" placeholder="jon doe" />`;
                            } 
                        ?>
                    </div>

                </div>

            </div>


            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Date of Birth
                    </label>
                </div>
                <div class="flex md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                        name="dob_day" placeholder="day" />
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                        name="dob_month" placeholder="month" />
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                        name="dob_year" placeholder="year" />
                </div>
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