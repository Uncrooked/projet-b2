<?php

require_once("./src/controllers/products.php");

class ProductDetailsModel{

    private static $product_id;
    public static $product;

    public static function productDetails($database){
            self::$product_id = htmlspecialchars($_GET["product_id"]);
            ProductsController::getProduct($database,self::$product_id);
            self::$product = ProductsController::$data[0];
    }
}