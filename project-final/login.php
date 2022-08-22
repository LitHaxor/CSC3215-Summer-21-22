<?php include "./common/headers.php"; ?>

<?php include "./common/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">ECMS Login</h4>
			<p class="message"></p>
			<form id="admin-login-form">
                <div class="alert alert-primary error" role="alert">

                </div>
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter username">
                  <span class="username-error text-danger"></span>
              </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  <span class="password-error text-danger"></span>
              </div>
			  <input type="hidden" name="admin_login" value="1">
			  <button type="button" class="btn btn-success login-btn">Login</button>
			</form>
		</div>
	</div>
</div>


<script>
    function validateForm() {
        let valid = true
        const x = document.forms["admin-login-form"]["username"].value;

        if (x == null || x == "") {
            document.querySelector('.username-error').innerHTML = 'Username is required';
            valid =  false;
        }

        var y = document.forms["admin-login-form"]["password"].value;
        if (y == null || y == "") {

            document.querySelector('.password-error').innerHTML = 'Password is required';
            valid = false;
        }

        return valid;
    }

    if(document.querySelector('.login-btn')){
        document.querySelector('.login-btn').addEventListener('click', function(e){
            e.preventDefault();
            validateForm();
        });
    }
</script>




<?php include "./common/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
