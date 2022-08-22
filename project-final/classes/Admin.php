<?php
session_start();
    require_once (__DIR__."/../controller/user.controller.php");

class Admin
{




    function __construct()
	{

	}

	public function getAdminList(){
        $userController = new UserController();
        $userId = $_SESSION['admin_id'];

	    $user = $userController->getUserById($userId);

		if (isset($user)) {

			return ['status'=> 202, 'users'=> $user];
		}
		return ['status'=> 303, 'message'=> 'No Admin'];
	}


}


if (isset($_POST['GET_ADMIN'])) {
	$a = new Admin();
	echo json_encode($a->getAdminList());
	exit();
	
}

?>