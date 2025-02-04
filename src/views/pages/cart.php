<?php 

$total_price = 0;

?>

<section id="cart">
    <h1>PANIER</h1>
    <div class="container">
        <div class="cart-container">

                <ul class="item-head">
                    <li class="img-head">Image</li>
                    <li class="product-type-head">Type</li>
                    <li class="price-head">Prix</li>
                    <li class="products-number-head">Nombre</li>
                    <li class="total-item-price-head">Total</li>
                </ul>
            <?php if(isset($cart_to_show) && !empty($cart_to_show)) :?>
                <ul>
                    <?php foreach($cart_to_show as $item_data) : ?>
                        <li>
                            <ul class="item">
                                <li>
                                    <img src="<?= $item_data["product"]["img_url"] ?>" alt="">
                                </li>
                                <li class="product-type"><?= $item_data["product"]["product_name"] ?></li>
                                <li class="price"><?= $item_data["product"]["price"] ?> €</li>
                                <li class="products-number"><?= $item_data["item"]["number_of_products"] ?></li>
                                <li class="total-item-price"><?= round($item_data["product"]["price"] * $item_data["item"]["number_of_products"],2) ?>€</li>
                                <?php $total_price += round($item_data["product"]["price"] * $item_data["item"]["number_of_products"],2); ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else :?>
                <p>Pas d'articles</p>
            <?php endif;?>
            <a href="./?page=cart&cart-empty=true" id="delete-all" class="btn">Tout supprimer</a>
        </div>

        <div class="details-container">
            <h2>Détails</h2>
            <p>SOMME : <?= $total_price ?>€</p>
            <?php if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])): ?>
                <a href="" class="btn">Valider le panier</a>
            <?php endif;?>
        </div>
    </div>
</section>


<form action="./?page=delete" method="POST">