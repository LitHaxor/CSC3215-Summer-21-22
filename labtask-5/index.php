<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Product</title>
</head>
<?php
    require_once (__DIR__ . "/controller/product.controller.php");

    $productController = new ProductController();

    $editId = null;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['id'])) {
            $editId = $_POST['id'];
            $productController->updateOne($editId, $_POST);
            Header("Location: index.php");
        } else {
            $productController->insertOne($_POST['name'], $_POST['buying_price'], $_POST['selling_price']);
        }

    }

    if($_SERVER['REQUEST_METHOD'] == "GET") {
        if(isset($_GET['edit'])) {
            $editId = $_GET['id'];
        } else if(isset($_GET['delete'])) {
            $productController->deleteOne($_GET['id']);
        }
    }

?>

<body class="container ">
    <h2>Add Product</h2>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="buy_price">Buy Price</label>
                <input type="text" class="form-control" id="buy_price" name="buying_price" placeholder="Enter buy price">
            </div>
            <div class="form-group">
                <label for="sell_price">Sell Price</label>
                <input type="text" class="form-control" id="sell_price" name="selling_price" placeholder="Enter sell price">
            </div>
            <button type="submit" class="btn my-2 btn-primary">Submit</button>
        </form>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Buying Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="my-4">
                <h2>Product List</h2>
                <?php
                    $products = $productController->findAll();
                    foreach($products as $product) {
                        if($editId == $product['id']) {
                            echo "<tr>";
                            echo "<th scope='row'>{$product['id']}</th>";
                            echo "<td><form method='post'><input type='text' value='{$product['name']}' name='name'></td>";
                            echo "<td><input type='text' value='{$product['buying_price']}' name='buying_price'></td>";
                            echo "<td><input type='text' value='{$product['selling_price']}' name='selling_price'></td>";
                            echo "<input type='hidden' value='{$product['id']}' name='id'>";
                            echo "<td><button class='btn btn-warning' type='submit'>Update</button></form></td>";
                            echo "<td><a class='btn btn-danger' href='index.php'>Cancel</a></td>";
                            echo "</tr>";
                        } else {
                            echo "<tr>";
                            echo "<th scope='row'>{$product['id']}</th>";
                            echo "<td>{$product['name']}</td>";
                            echo "<td>{$product['buying_price']}</td>";
                            echo "<td>{$product['selling_price']}</td>";
                            echo "<input type='hidden' value='{$product['id']}' name='id'>";
                            echo "<td><a class='btn btn-warning' href='index.php?id={$product['id']}&edit=true'>Edit</a></td>";
                            echo "<td><a class='btn btn-danger' href='index.php?id={$product['id']}&delete=true'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>