<?php
?>

<div class=" col-2 bg-primary text-white h-full" style="height: 100%">
    <div class="mt-5 container">
        <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
        <a href="/profile.php" class="btn btn-primary">Profile</a>
        <a href="/add_user.php" class="btn btn-primary">Add Users</a>
        <a href="/users.php" class="btn btn-primary">User List</a>
        <a href="/products.php" class="btn btn-primary">Products List</a>
        <a href="/stores.php" class="btn btn-primary">Store List</a>
    </div>
</div>
