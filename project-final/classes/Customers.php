<?php 
session_start();

require_once (__DIR__ . '/../controller/user.controller.php');

class Customers
{
	
	private $userController;

	function __construct()
	{
        $userController= new UserController();
	}

	public function getCustomers(){
        $user = $this->userController->findAll();
		if (isset($user)) {

			return ['status'=> 202, 'message'=> $user];
		}
		return ['status'=> 303, 'message'=> 'no customer data'];
	}



	

}


/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/

if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}



?>