$(document).ready(function(){

	$(".register-btn").on("click", function(){
		$.ajax({
			url : 'classes/Auth.php',
			method : "POST",
			data : $("#admin-register-form").serialize(),
			success : function(response){
				console.log(response);
				const resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					$(".error").html('<span class="text-success">'+resp.message+'</span>');
				}else if(resp.status == 303){
					$(".error").html('<span class="text-danger">'+resp.message+'</span>');
				}
			}
		});

	});

	$(".login-btn").on("click", function(){
		$.ajax({
			url : 'classes/Auth.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				const resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					window.location.href = window.origin + "./../index.php";
				}else if(resp.status == 303){
					alert('Login failed');
					$("#admin-register-form").reset();
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
				}
			}
		});

	});``
});