 <nav class="navbar navbar-primary fixed-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-white" href="#">ECMS</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['admin_id'])) {
    			?>
    				<a class="nav-link text-white" href="admin-logout.php">Sign out</a>
    			<?php
    		} else{
    			$uriAr = explode("/", $_SERVER['REQUEST_URI']);
    			$page = end($uriAr);
                ?>
                <a class="nav-link text-white" href="login.php">Login</a>
                <?php
    		}
    	?>
    </li>
  </ul>
</nav>