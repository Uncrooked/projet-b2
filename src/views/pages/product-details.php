<section id="product-details"> 
    <div class="left">
        <img src="<?= $product["img_url"] ?>" alt="" class="img-slider">
    </div>
    <div class="right">
        <div>
            <h1><?= $product["product_name"] ?></h1>
            <span class="product-type"><?= $product["category_name"] ?></span>
        </div>
        <p class="price"><?= $product["price"] ?>€</p>
        <p class="desc"><?= $product["description"] ?></p>
        
        <form action="./?page=cart" method="post">
            <input type="hidden" value="<?=$product["id"]?>" name="product_id_add_to_cart" id="product_id_add_to_cart">
            <div class="how-many-products">
                <label for="how-many" >Number</label>
                <input type="number" id="how-many" name="how-many" min=0>
            </div>
            <input type="submit" class="btn" value="Add to cart" disabled>
        </form>
    </div>
</section>