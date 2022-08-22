<?php

    require_once (__DIR__ . '/../model/user.model.php');

    class UserController {



        public function getUserById($id) {
            $userModel = new UserModel();
            return $userModel->findOne($id);
        }


        public function createUser($data): bool|PDOStatement
        {
            $userModel = new UserModel();

            $userModel->name = $data['name'];
            $userModel->password = password_hash($data['password']);
            $userModel->email = $data['email'];
            $userModel->username = $data['username'];
            $userModel->gender = $data['gender'];

            return $userModel->insertOne();
        }

        public function loginUser ($username, $password): bool
        {
            $userModel = new UserModel();
            $user = $userModel->findOneByUsername($username);
            if(!isset($user)) {
                return false;
            }

            if($user['password'] !== $password) {
                return false;
            }

            $_SESSION['admin_id'] = $username;

            return true;
        }


        public function registerUser ($data) {
            $userModel = new UserModel();

            if($userModel->findOneByUsername($data['username'])) {
                return false;
            } else {
                $user = $this->createUser($data);
                $_SESSION['username'] = $user['username'];
            }
        }

        public function updateUser() {

        }

    }
?>