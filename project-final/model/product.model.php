<?php
    require_once (__DIR__ . "/../utils/database.php");

    class ProductModel
    {
        protected ?PDO $db;

        public string $name;
        public float $buying_price;
        public float $selling_price;


        public function __construct()
        {
            $this->db = Database::getInstance();
        }


        public  function insertOne(): bool|PDOStatement
        {
            $sql = "INSERT INTO products(name,buying_price, selling_price) VALUES (?, ?, ?)";
            $args = [$this->name, $this->buying_price, $this->selling_price];
            return Database::run($sql, $args);
        }

        public function findAll(): bool|array
        {
            $sql = "SELECT * FROM products";
            $stmt = Database::run($sql);
            return $stmt->fetchAll();
        }

        public function findOne(int $id) {
            $sql = "SELECT * FROM pdowrapper WHERE id=?";
            $stmt = Database::run($sql, [$id]);
            return $stmt->fetch();
        }

        public function updateOne(int $id, $data): int
        {
            $sql = "UPDATE products SET name=?, buying_price=?, selling_price=? WHERE id=?";
            $stmt = Database::run($sql, [$data['name'], $data['buying_price'], $data['selling_price'], $id]);
            return $stmt->rowCount();
        }

        public function deleteOne(int $id): int
        {
            $sql = "DELETE FROM products WHERE id=?";
            $stmt = Database::run($sql, [$id]);
            return $stmt->rowCount();
        }
    }