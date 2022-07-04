<?php
    session_start();
    if(!isset($_SESSION['username'])){
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css" integrity="sha256-o+AsfCHj7A1M5Xgm1kJmZiGEIvMQEzQqrXz2072Gkkg=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
    <title>User Lists | ECMS</title>
</head>


<body>
    <?php include 'navbar.php'; ?>
    <?php

        include 'controller/user.controller.php';
        $users = get_users();

        function print_users($users):void
        {
            foreach($users as $user) {
                echo '<tr>';
                echo '<td scope="row">'.$user['username'].'</td>';
                echo '<td>'.$user['email'].'</td>';
                echo '<td>'.$user['name'].'</td>';
                echo '<td>'.$user['dob'].'</td>';
                echo '<td>'.$user['gender'].'</td>';
                echo '<td>'.$user['role'].'</td>';
                echo '<td><a class="btn btn-warning" href="/add_user.php?username='.$user['username'].'">Edit</a></td>';
                echo '<td><a class="btn btn-danger" href="/add_user.php?username='.$user['username'].'&delete=true">Delete</a></td>';
                echo '</tr>';
            }
        }

    ?>
    <main class="row" style="height: 100vh">
        <?php include 'side_nav.php'; ?>

        <div class="col-10">
            <div class="container mt-5 mb-2">
                <h2>User List</h2>
            </div>

            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>


                    </thead>
                    <tbody>

                    <?php echo print_users($users) ?>

                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>



</html>

