<?php

require_once("./src/controllers/products.php");


class homeModel{

    public static $all_products;

    public static function home($database){

        ProductsController::getProducts($database);
        self::$all_products = ProductsController::$data;
    }
}