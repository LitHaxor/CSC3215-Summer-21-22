<?php
    require_once (__DIR__ . '/../db/database.php');

    class UserModel {
        protected ?PDO $db;

        public string $id;
        public string $name;
        public string $username;
        public string $password;
        public string $email;
        public string $gender;
        public  $created_at;


        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function findAll(): bool|array
        {
            $sql = "SELECT * FROM users";
            $stmt = Database::run($sql);
            return $stmt->fetchAll();
        }

        public function findOneByUsername(int $username) {
            $sql = "SELECT * FROM users WHERE username=?";
            $stmt = Database::run($sql, [$username]);
            return $stmt->fetch();
        }


        public function insertOne(): bool|PDOStatement
        {
            $sql = "INSERT INTO users(username, name, email, password, gender) VALUES(?,?,?,?)";
            $args = [$this->username, $this->name, $this->email, $this->password];
            return Database::run($sql, $args);
        }

        public function updateOne(int $id, $data)
        {
            $sql = "UPDATE users SET name=?, email=?, password=? WHERE id=?";
            $args = [$data['name'], $data['email'], $data['password'], $id];
            $stmt = Database::run($sql, $args);
            return $stmt->rowCount();
        }

        public  function deleteOne(int $id) {
            $sql = "DELETE FROM users WHERE id=?";
            $stmt = Database::run($sql, [$id]);
            return $stmt->rowCount();
        }


    }
?>