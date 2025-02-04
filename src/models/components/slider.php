<?php

require_once("./src/controllers/components.php");


class SliderModel{

    public static $sliderData;
    public static $currentSlider;

    public static function slider($database){
        self::$sliderData = SliderController::getSliderData($database);
        self::$sliderData = SliderController::$data;
        self::$currentSlider = [];
    }
}