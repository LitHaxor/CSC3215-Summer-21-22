<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./common/headers.php";

?>
 
<?php include "./common/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./common/sidebar.php"; ?>

      <h2><center>Admin Details</center></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>

            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include "./common/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
