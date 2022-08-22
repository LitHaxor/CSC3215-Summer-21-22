<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forget | Page</title>
</head>

<body>
    <?php 
      include "./navbars/navbar.php"
    ?>
    <div>
        <h2 class="text-3xl m-10">Forget Password?</h2>
    </div>

    <div>
        <form class="m-10 w-full max-w-sm">

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
      include "./footer/footer.php";
    ?>

</html>