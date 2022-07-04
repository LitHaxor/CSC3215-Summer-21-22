<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ECMS | HOME PAGE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css" integrity="sha256-o+AsfCHj7A1M5Xgm1kJmZiGEIvMQEzQqrXz2072Gkkg=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
</head>
    <?php
        include 'navbar.php';
    ?>
    <body>

        <div class="row" style="height:100vh">
        <?php
            include 'side_nav.php';
        ?>

            <div class="col-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Welcome to Ecommerce Management System</h1>
                        <p class="lead">.</p>
                    </div>
                </div>

                <div class="row container">
                    <div class="card mx-4 text-white bg-success col-3">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Orders</h5>
                            <h6 class="card-subtitle mb-2 text-white">0</h6>
                        </div>
                    </div>

                    <div class="card mx-4 text-white bg-primary col-3" >
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Customers</h5>
                            <h6 class="card-subtitle text-white">0</h6>
                        </div>
                    </div>



                    <div class="card mx-4 text-white bg-info col-3" >
                        <div class="card-body">
                            <h5 class="card-title text-white">Total revenue</h5>
                            <h6 class="card-subtitle mb-2 text-white">$ 200</h6>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </body>
</html>