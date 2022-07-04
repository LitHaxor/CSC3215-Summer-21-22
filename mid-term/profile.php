<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css" integrity="sha256-o+AsfCHj7A1M5Xgm1kJmZiGEIvMQEzQqrXz2072Gkkg=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
    <title>My Profile | ECMS</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <main class="row" style="height: 100vh">
        <?php include "side_nav.php"; ?>

        <?php
            include "controller/user.controller.php";

            $user = get_user($_SESSION['username']);
        ?>

        <div class="col-10 mt-5">
            <div class="container">
                <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
                <hr />
                <div class="row">
                    <div class="col-6">
                        <h4>Personal Information</h4>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Profile Picture</th>
                                    <td>
                                        <img src="<?php echo $user['profile_picture']; ?>" alt="profile picture" class="img-fluid" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><?php echo $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $user['name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date of Birth</th>
                                    <td><?php echo $user['dob']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td><?php echo $user['gender']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Role</th>
                                    <td><?php echo $user['role']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">CreatedAt</th>
                                    <td><?php echo $user['createdAt']; ?></td>
                                </tr>

                            </tbody>
                        </table>

            </div>
    </main>
</body>


