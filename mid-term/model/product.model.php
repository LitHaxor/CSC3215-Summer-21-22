<?php

    function load_product() {
        if(file_exists(__DIR__ . '/../data/product.json')){
            return json_decode(file_get_contents(__DIR__ . '/../data/product.json'), true);
        }
    }

    function save_product($product) {
        $products = load_product();
        $products[] = $product;
        return file_put_contents(__DIR__ . '/../data/product.json', json_encode($products));
    }

    function get_product($id) {
        $products = load_product();
        foreach($products as $product){
            if($product['id'] == $id){
                return $product;
            }
        }
        return false;
    }

    function create_product($name, $price, $description, $image, $category, $quantity, $status): bool{
        $product = array(
            "name" => $name,
            "price" => $price,
            "description" => $description,
            "image" => $image,
            "category" => $category,
            "quantity" => $quantity,
            "status" => $status
        );
        return save_product($product);
    }

    function update_product($id, $name, $price, $description, $image, $category, $quantity) {
        $products = load_product();
        foreach($products as $key => $product){
            if($product['id'] == $id){
                $products[$key]['name'] = $name;
                $products[$key]['price'] = $price;
                $products[$key]['description'] = $description;
                $products[$key]['image'] = $image;
                $products[$key]['category'] = $category;
                $products[$key]['quantity'] = $quantity;
            }
        }
        return file_put_contents(__DIR__ . '/../data/product.json', json_encode($products));
    }

    function delete_product($id) {
        $products = load_product();
        foreach($products as $key => $product){
            if($product['id'] == $id){
                unset($products[$key]);
            }
        }
        return file_put_contents(__DIR__ . '/../data/product.json', json_encode($products));
    }
?>