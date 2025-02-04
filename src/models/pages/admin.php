<?php

include_once("./src/controllers/admin.php");
include_once("./src/controllers/products.php");

class AdminModel{

    private static $data;
    private static $error;
    private static $product_id;
    private static $all_categories;
    private static $all_products;
    private static $lastData;
    private static $post_params;
    
    public static $return_data;

    private static function getDataForForm($database){
        //get All Categories for form
        AdminController::getCategories($database);
        self::$all_categories = AdminController::$select_data;
        //get All Products for form
        ProductsController::getProducts($database);
        self::$all_products = ProductsController::$data;
    }

    private static function adminConnect(){
        //admin connection
        if(isset($_POST["password-admin"]) && !empty($_POST["password-admin"])){
            $content = @file_get_contents("./public/assets/data/data.json");
            $content = json_decode($content);
            if($_POST["password-admin"] == $content->admin_panel_password){
                $_SESSION["admin-connect"] = true;
            }
        }
    }

    private static function uploadImg($database){
        //upload product img
        if(self::$data["product_img"]["type"] == "image/png"){//verify
            move_uploaded_file(self::$data["product_img"]["url"],"./public/assets/img/products/".self::$data["product_img"]["name"]);
            if(self::$data["product_price"] > 0){
                AdminController::insertProduct($database,self::$data);
            }else{
                self::$error = "Veuillez mettre un prix";
            }
        }else{
            self::$error = "Veuillez sélectionner une image png";
        }
    }

    private static function deleteProductFromForm($database){
        if(isset($_POST["delete-product"]) && !empty($_POST["delete-product"])){
            self::$product_id = htmlspecialchars($_POST["all-products"]);
            AdminController::deleteProduct($database,self::$product_id);
        }
    }

    public static function admin($database){

        session_start();

        self::getDataForForm($database);
        self::adminConnect();
    
        //add product
    
        if(
            isset($_POST["product-name"]) && !empty($_POST["product-name"]) &&
            isset($_POST["product-type"]) && !empty($_POST["product-type"]) &&
            isset($_FILES["product-img"]) && !empty($_FILES["product-img"]) &&
            isset($_POST["product-price"]) && !empty($_POST["product-price"]) &&
            isset($_POST["product-desc"]) && !empty($_POST["product-desc"])
        ){
    
            self::$data = [
                "product_name" => htmlspecialchars($_POST["product-name"]),
                "product_type" => htmlspecialchars($_POST["product-type"]),
                "product_img" => [
                    "name" => htmlspecialchars($_FILES["product-img"]["name"]),
                    "new_path" => "./public/assets/img/products/".htmlspecialchars($_FILES["product-img"]["name"]),
                    "url" => htmlspecialchars($_FILES["product-img"]["tmp_name"]),
                    "type" => htmlspecialchars($_FILES["product-img"]["type"])
                ],
                "product_price" => htmlspecialchars($_POST["product-price"]),
                "product_desc" => htmlspecialchars($_POST["product-desc"])
            ];

            self::uploadImg($database);
        }

        self::deleteProductFromForm($database);
    
        self::$return_data = ["error" => self::$error,"data" => [self::$all_categories,self::$all_products]];
    }
}