<?php
    require_once (__DIR__ . "../model/product.model.php");

    class ProductController
    {
        public function insertOne($name, $buy_price, $sell_price): void
        {
            $product = new ProductModel();
            $product->name = $name;
            $product->buying_price = $buy_price;
            $product->selling_price = $sell_price;
            $product->insertOne();
        }

        public function findAll(): bool|array
        {
            $product = new ProductModel();
            return $product->findAll();
        }

        public function findOne(int $id) {
            $product = new ProductModel();
            return $product->findOne($id);
        }

        public function updateOne(int $id, $data): int
        {
            $product = new ProductModel();
            return $product->updateOne($id, $data);
        }

        public function deleteOne(int $id): int
        {
            $product = new ProductModel();
            return $product->deleteOne($id);
        }
    }


?>