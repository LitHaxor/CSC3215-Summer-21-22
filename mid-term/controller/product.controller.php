<?php
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/product.model.php');


    function get_all_products() {
        return load_product();
    }
?>