<?php

require_once("./src/controllers/products.php");

Class CartController{
    
    private static $data;
    private static $product_id_add_to_cart;
    private static $cart_item_is_here;
    private static $all_items_ids;
    private static $all_data_products;
    private static $item_data;

    public static $cart_to_show;

    public static function setCart($product_id,$number_of_products){
        //escap data
        self::$product_id_add_to_cart = $product_id;


        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){//if there is an item in the cart
                    
            self::$cart_item_is_here = false;
        
            //IF THERE IS AN ITEM
            foreach($_SESSION["cart"] as $index => $cart_item){//foreach to search the item in the cart
        
                if(isset($cart_item["product_id"]) && !empty($cart_item["product_id"]) && $cart_item["product_id"] == self::$product_id_add_to_cart){//check if the item in the cart is the same than current item
                    $_SESSION["cart"][$index]["number_of_products"] += $number_of_products;//add 1 to number of item
                    self::$cart_item_is_here = true;//action finish
                }
        
            }
        
            //IF THERE IS NO ITEM (ELSE)
            if(!self::$cart_item_is_here){

                self::$data = [
                    "number_of_products" => $number_of_products,
                    "product_id" => self::$product_id_add_to_cart
                ];
                
                array_push($_SESSION["cart"],self::$data);

            }
        }else{

            self::$data = [
                "number_of_products" => $number_of_products,
                "product_id" => self::$product_id_add_to_cart
            ];
            
            $_SESSION["cart"] = [];
            array_push($_SESSION["cart"],self::$data);
        }
    }


    public static function setDataToShow($database){
        self::$all_items_ids = [];

        foreach($_SESSION["cart"] as $item_reference){//Set all ids
            array_push(self::$all_items_ids,$item_reference["product_id"]);
        }

        //gext all data products from ids
        productsController::getCartProducts($database,self::$all_items_ids);
        self::$all_data_products = productsController::$data;

        self::$cart_to_show = [];

        foreach($_SESSION["cart"] as $item){

            foreach(self::$all_data_products as $product){

                if($item["product_id"] == $product["id"]){
                    self::$item_data = [];
                    self::$item_data["item"] = $item;
                    self::$item_data["product"] = $product;
                    array_push(self::$cart_to_show,self::$item_data);
                }

            }

        }

    }
}