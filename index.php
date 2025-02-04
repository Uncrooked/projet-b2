<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/style.css?version=<?=time()?>">
    <link rel="icon" href="./public/assets/img/logos/ornament.svg" />
    <script src="./public/assets/js/script.js?version=<?=time()?>" defer type="module"></script>
    <title>Projet b2</title>
</head>
<body>

<?php

require_once("./src/views/components/header.php");

require_once("./src/controllers/db.php");

try{
    
    DatabaseClass::connect();
    $database = DatabaseClass::$database;
    
    if(isset($_GET["page"])){

        switch(htmlspecialchars($_GET['page'])){
            case 'shop':
                require_once("./src/models/pages/shop.php");
                ShopModel::shop($database);
                $all_products = ShopModel::$all_products;
                require_once("./src/views/pages/shop.php");
                break;
            case 'cart':
                require_once("./src/models/pages/cart.php");
                CartModel::cart($database);
                $data = CartModel::$data_to_return;

                if(!empty($data["error"])){
                    $error = $data["error"];
                }else{
                    $cart_to_show = $data["cart_to_show"];
                }

                require_once("./src/views/pages/cart.php");
                break;
            case 'product-details':
                require_once("./src/models/pages/product-details.php");
                if(isset($_GET["product_id"]) && !empty($_GET["product_id"])){
                    ProductDetailsModel::productDetails($database);
                    $product = ProductDetailsModel::$product;
                    require_once("./src/views/pages/product-details.php");
                }
                break;
            case 'admin':
                require_once("./src/models/pages/admin.php");
                AdminModel::admin($database);
                $data = AdminModel::$return_data;

                $all_categories = $data["data"][0];
                $all_products = $data["data"][1];

                if(isset($data["error"])){
                    $error = $data["error"];
                }else{
                    if(isset($_POST) && !empty($_POST)){
                        header("location: ./?page=admin");
                        exit();
                    }
                }

                if(!isset($_SESSION["admin-connect"])){
                    include_once("./src/views/components/admin-password.php");
                }else{
                    include_once("./src/views/pages/admin-panel.php");
                }

                break;
            default:
                require_once("./src/models/pages/home.php");
                HomeModel::home($database);
                $all_products = HomeModel::$all_products;
                require_once("./src/views/pages/home.php");
                break;
        }

    }else{
        require_once("./src/models/pages/home.php");
        HomeModel::home($database);
        $all_products = HomeModel::$all_products;
        require_once("./src/views/pages/home.php");
    }

}catch(Exception $e){
    echo $e->getMessage();
}

require_once("./src/views/components/footer.php");
?>

<?php
if(isset($error) && !empty($error)){
    echo "<p id='error'>".$error."</p>";
}
$error = "";
?>
    
</body>
</html>