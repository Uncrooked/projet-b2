<section id="admin-panel">
    <h1>Panneau administrateur</h1>
    <form action="./?page=admin" method="post" enctype="multipart/form-data">
        <h2>Ajouter un produit</h2>
        <div class="row">
            <label for="product-name">Nom</label>
            <input type="text" name="product-name" id="product-name">
        </div>

        <div class="row">
            <label for="product-img" class="file-label">Choisir une image</label>
            <input type="file" name="product-img" id="product-img">
        </div>

        <div class="row">
            <label for="product-type">Type</label>
            <select name="product-type" id="product-type">
                <?php if(isset($all_categories) && !empty($all_categories)) : ?>
                    <?php foreach($all_categories as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="row">
            <label for="product-price">Prix</label>
            <input type="number" name="product-price" id="product-price" step="0.01" min="1">
        </div>

        <div class="row">
            <label for="product-desc">Description</label>
            <textarea name="product-desc" id="product-desc"></textarea>
        </div>
        <br>

        <input type="submit" class="btn">
    </form>

    <form action="./?page=admin" method="post">
        <h2>Supprimer un produit</h2>

        <input type="hidden" name="delete-product" id="delete-product" value="true">

        <div class="row">
                <label for="all-products">Produit</label>
                <select name="all-products" id="all_products">
                    <?php if(isset($all_products) && !empty($all_products)) :?>
                        <?php foreach($all_products as $product) :?>
                            <option value="<?= $product["id"] ?>"><?= $product["product_name"] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

            <br>

            <input type="submit" value="supprimer le produit" class="btn">
        </div>
    </form>
</section>