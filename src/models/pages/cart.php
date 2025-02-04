<?php

require_once("./src/controllers/cart.php");
require_once("./src/controllers/products.php");

class CartModel{

    private static $product_id;
    private static $number_of_products;
    private static $error;
    private static $cart_to_show;
    public static $data_to_return;

    private static function setCartData(){
        //SET CART DATA WITH CURRENT ITEM
        if(isset($_POST) && !empty($_POST)){
    
            self::$product_id = htmlspecialchars($_POST["product_id_add_to_cart"]);
            self::$number_of_products =intval(htmlspecialchars($_POST["how-many"]));
            
            if(is_integer(self::$number_of_products) && self::$number_of_products > 0){
            
                CartController::setCart(self::$product_id,self::$number_of_products);
                header("location: ./?page=cart");
                exit();
            
            }else{
                self::$error = "Veuillez sélectionner un nombre valide d'articles";
            }
        }
    }

    private static function cartEmpty(){
        //cart empty
        if(isset($_GET["cart-empty"]) && $_GET["cart-empty"] == true){
            $_SESSION["cart"] = null;
            header("location: ./?page=cart");
            exit();
        }
    }

    private static function showData($database){
        //get products data from cart session
        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){
            CartController::setDataToShow($database);
            self::$cart_to_show = CartController::$cart_to_show;
        }
    }

    public static function cart($database){
        session_start();
    

        self::setCartData();
        self::cartEmpty();
        self::showData($database);

        self::$data_to_return = ["error" => self::$error,"cart_to_show" => self::$cart_to_show];

    }

}