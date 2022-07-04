

<nav class="navbar container navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">ECMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Home</a>
            </li>

        </ul>
    </div>
    <span>
        <?php
        if(isset($_SESSION['username'])){
            echo '<span class="mx-2">Welcome, ' . $_SESSION['username'] . '</span>';
            echo '<a href="/logout.php" class="btn btn-primary">Logout</a>';
        }else{

            echo '<a href="/login.php" class="btn btn-primary">Login</a>';
        }
        ?>
    </span>
</nav>