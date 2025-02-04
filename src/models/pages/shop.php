<?php

require_once("./src/controllers/products.php");

class ShopModel{

    public static $all_products;

    public static function shop($database){
        ProductsController::getProducts($database);
        self::$all_products = ProductsController::$data;
    }
}