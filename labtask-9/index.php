<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <script src="jquery.min.js" async />
</head>

<?php
    $products = [];
?>
<body>

    <h1>Welcome to the Home Page</h1>
    <p>
        <div>
            <h2>Products</h2>
        </div>

        <div>
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                </tr>
                <?php

                foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td>".$product['product_id']."</td>";
                        echo "<td>".$product['product_name']."</td>";
                        echo "<td>".$product['product_price']."</td>";
                        echo "<td>".$product['product_description']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>

        <script>
            const doc = $(document);
            doc.title("Home Page");

        </script>
    </p>





</body>
</html>