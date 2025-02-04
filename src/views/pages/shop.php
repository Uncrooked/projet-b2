<section id="shop">
    <h1>SHOP</h1>
    <div class="archive-products">
        <?php foreach($all_products as $product) : ?>
            <a href="./?page=product-details&product_id=<?=$product["id"]?>" class="product-card">
                <img src="<?=$product["img_url"]?>" alt="">
                <h2 class="product-name"><?=$product["product_name"]?></h2>
                <p class="category"><?=$product["category_name"]?></p>
                <p class="price"><?=$product["price"]?>€</p>
            </a>
        <?php endforeach; ?>
    </div>
</section>