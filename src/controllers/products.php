<?php

include_once("./src/controllers/db.php");

class ProductsController{

    private static $getRequest;
    private static $request;
    public static $data;
    private static $placeholders;


    public static function getProducts($database){
        DatabaseClass::query($database,"SELECT products.*, img.img_url, categories.category_name FROM products LEFT JOIN img ON img.id = products.img_id LEFT JOIN categories ON categories.id = products.category_id",[]);
        self::$data = DatabaseClass::$statement->fetchAll();
    }

    public static function getProduct($database,$productId){

        DatabaseClass::query($database,"SELECT products.*, img.img_url, categories.category_name FROM products LEFT JOIN img ON img.id = products.img_id LEFT JOIN categories ON categories.id = products.category_id WHERE products.id = :id",["id" => $productId]);
        self::$data = DatabaseClass::$statement->fetchAll();
    }

    public static function getCartProducts($database,$all_product_cart_ids){

        self::$placeholders = [];

        for($i = 0; $i < count($all_product_cart_ids); $i++){
            array_push(self::$placeholders,"?");
        }

        self::$placeholders = implode(",",self::$placeholders);

        DatabaseClass::query($database,"SELECT products.*, img.img_url, categories.category_name FROM products LEFT JOIN img ON img.id = products.img_id LEFT JOIN categories ON categories.id = products.category_id WHERE products.id IN(".self::$placeholders.")",$all_product_cart_ids);
        self::$data = DatabaseClass::$statement->fetchAll();
    }
}