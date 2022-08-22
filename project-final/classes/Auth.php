<?php 
    session_start();
    require_once (__DIR__ . '/../controller/user.controller.php');

class Auth
{

    private UserController $userController;


	function __construct()
	{

        $this->userController = new UserController();
	}


	public function createAdminAccount($name, $email, $password, $username, $gender): bool
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'username' => $username,
            'email' => $email,
            'gender' => $gender];
        $valid = $this->userController->createUser($data);

        if(isset($valid)) {
            Header('Location: ../login.php');
        } else {
            Header('Location: ../register.php');
        }
    }


	public function loginAdmin($usermame, $password){
		$valid = $this -> userController -> loginUser($usermame, $password);

        if($valid){
            return ['status'=> 202, 'message'=> 'Login Successful'];
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Auth'];
        }
	}

}



    if (isset($_POST['admin_register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $cpassword = $_POST['cpassword'];
        if (!empty($name) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($username)) {
            if ($password == $cpassword) {
                $c = new Auth();
                $result = $c->createAdminAccount($name, $email, $password, $username, $email);
                echo json_encode($result);
                exit();
            }else{
                echo json_encode(['status'=> 303, 'message'=> 'Password mismatch']);
                exit();
            }
        }else{
            echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
            exit();
        }
    }

    if (isset($_POST['admin_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($username) && !empty($password)) {
            $c = new Auth();
            $result = $c->loginAdmin($username, $password);
            echo json_encode($result);
            exit();
        }else{
            echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
            exit();
        }
    }
?>