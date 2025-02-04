<?php

require_once("./src/controllers/db.php");

Class AdminController{

    private static $img_id;
    private static $img_data;

    public static $select_data = null;
    public static $statement = null;
    public static $image_id = null;

    private static function insertImagePath($database,$img_url){
        DatabaseClass::query($database, "INSERT INTO img(img_url) VALUES (:img_url)",["img_url" => $img_url]);
        self::$statement = DatabaseClass::$statement;
        // Retrieve the last inserted ID
        self::$image_id = $database->lastInsertId();
    }

    private static function getImgId($database,$product_id){

        DatabaseClass::query($database,"SELECT img_id FROM products WHERE id = :id",["id" => $product_id]);
        self::$img_data = DatabaseClass::$statement->fetch();

    }

    private static function deleteImgProduct($database,$img_id_param){
        //delete product
        DatabaseClass::query($database,"DELETE FROM img WHERE id = :id",["id" => $img_id_param]);
    }

    private static function removeFile($database,$img_id_param){

        DatabaseClass::query($database,"SELECT img_url FROM img WHERE id = :id",["id" => $img_id_param]);
        self::$select_data = DatabaseClass::$statement->fetch();

        if(!empty(self::$select_data["img_url"])){
            unlink(self::$select_data["img_url"]);
        }

    }
    

    public static function insertProduct($database,$data){
        self::insertImagePath($database,$data["product_img"]["new_path"]);

        if(self::$statement){


            DatabaseClass::query(
                $database, 
                "
                    INSERT INTO 
                    products(img_id,product_name,description,price,category_id) 
                    VALUES 
                    (:img_id,:product_name,:description,:price,:category_id)
                ",
                [
                    "img_id" => self::$image_id,
                    "product_name" => $data["product_name"],
                    "description" => $data["product_desc"],
                    "price" => $data["product_price"],
                    "category_id" => $data["product_type"]
                ]
        );
        
        }
    }

    public static function getCategories($database){
        DatabaseClass::query($database,"SELECT * FROM categories",[]);
        self::$select_data = DatabaseClass::$statement->fetchAll();
    }

    public static function deleteProduct($database,$product_id){

        //delete product_img
        self::getImgId($database,$product_id);//get img id

        self::$img_id = self::$img_data["img_id"];

        self::removeFile($database,self::$img_id);
        self::deleteImgProduct($database,self::$img_id);

        //delete product
        DatabaseClass::query($database,"DELETE FROM products WHERE id = :id",["id" => $product_id]);
    }
}