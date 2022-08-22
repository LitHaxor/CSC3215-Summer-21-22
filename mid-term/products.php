<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
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
    <title>User Lists | ECMS</title>
</head>


<body>
    <?php include 'navbar.php'; ?>
    <?php

        include 'controller/product.controller.php';
        $products = get_all_products();

        function print_products($products):void
        {
            if(isset($products))
                foreach($products as $product) {
                    echo '<tr>';
                    echo '<td scope="row">'.$product['id'].'</td>';
                    echo '<td><img src="'.$product['image'].'" alt="'.$product['name'].'" width="100"></td>';
                    echo '<td>'.$product['name'].'</td>';
                    echo '<td>'.$product['price'].'</td>';
                    echo '<td>'.$product['sold'].'</td>';
                    echo '<td>'.$product['stock'].'</td>';
                    echo '<td>'.$product['createdBy'].'</td>';
                    echo '<td>'.$product['createdAt'].'</td>';
                    echo '<td><a class="btn btn-danger" href="/products.php?username='.$product['id'].'&delete=true">Delete</a></td>';
                    echo '</tr>';
                }
        }

    ?>
    <main class="row" style="height: 100vh">
        <?php include 'side_nav.php'; ?>

        <div class="col-10">
            <div class="container mt-5 mb-2">
                <h2>Product List</h2>
            </div>

            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">image</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">Sold</th>
                            <th scope="col">qty</th>
                            <th scope="col">createdBy</th>
                            <th scope="col">createdAt</th>
                            <th scope="col">Action</th>

                        </tr>


                    </thead>
                    <tbody>

                        <?php echo print_products($products) ?>

                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>



</html>