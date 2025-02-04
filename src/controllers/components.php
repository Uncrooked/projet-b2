<?php

require_once("./src/controllers/db.php");

Class SliderController{
    public static $data;
    public static function getSliderData($database){
        DatabaseClass::query($database,"SELECT * FROM products INNER JOIN img ON products.img_id = img.id",[]);
        self::$data = DatabaseClass::$statement->fetchAll();
    }
}