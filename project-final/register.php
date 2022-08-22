<?php include "./common/headers.php"; ?>

<?php include "./common/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">Admin Registration</h4>
			<p class="message"></p>
			<form id="admin-register-form">
			  <div class="form-group">
			    <label for="name">Full Name</label>
                  <span class="name-error text-danger"></span>
			    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
			  </div>

                <div class="form-group">
                    <label for="username"> Username</label>
                    <span class="username-error text-danger"></span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>

			  <div class="form-group">
			    <label for="email">Email Address</label>
                    <span class="email-error text-danger"></span>
			    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
			    
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
                    <span class="password-error text-danger"></span>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword">Confirm Password</label>
                  <span class="cpassword-error text-danger"></span>
			    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Password">
			  </div>
                <div class="form-group">
                    <label for="gender">Role</label>
                    <span class="gender-error text-danger"></span>
                    <select class="form-control" name="gender" id="gender">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
			  <input type="hidden" name="admin_register" value="1">
			  <button type="button" class="btn btn-primary register-btn">Register</button>
			</form>
		</div>
	</div>
</div>

<script>
    function validateForm() {
        let valid = true

        const x = document.forms["admin-register-form"]["name"].value;
        if (x == null || x == "") {
            document.querySelector('.name-error').innerHTML = 'Name is required';
            valid = false;
        }
        const y = document.forms["admin-register-form"]["email"].value;
        const atpos = y.indexOf("@");
        const dotpos = y.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length) {
            document.querySelector('.email-error').innerHTML = 'Not a valid e-mail address';
            valid =  false;
        }
        const z = document.forms["admin-register-form"]["password"].value;
        if (z == null || z == "") {
            document.querySelector('.password-error').innerHTML = 'Password is required';
            valid = false;
        }
        const c = document.forms["admin-register-form"]["cpassword"].value;
        if (c == null || c == "") {
            document.querySelector('.cpassword-error').innerHTML = 'Confirm Password is required';
            valid = false;
        }
        if(z != c){
            document.querySelector('.cpassword-error').innerHTML = 'Password does not match';
            valid = false;
        }

        const un = document.forms["admin-register-form"]["username"].value;
        if (un == null || un == "") {
            document.querySelector('.username-error').innerHTML = 'Username is required';
            valid = false;
        }

        const gender = document.forms['admin-register-form']['gender']

        if(gender == null || gender =='') {

        }

        return valid;

    }

    if(document.querySelector('.register-btn')){
        document.querySelector('.register-btn').addEventListener('click', function(e){
            e.preventDefault();
            validateForm();
        });
    }
</script>



<?php include "./common/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
