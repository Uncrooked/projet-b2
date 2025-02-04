<section id="welcome-part">
    <div class="container left">
        <img src="./public/assets/img/logos/ornament.svg" alt="logo of the website">
        <h1>Soyez en paix avec votre intérieur</h1>
        <a href="./?page=shop" class="btn">Voir la boutique</a>
    </div>
    <div class="container right">
        <?php 
        require_once("./src/models/components/slider.php");
        SliderModel::slider($database);
        [$sliderData,$currentSlider] = [SliderModel::$sliderData,SliderModel::$currentSlider];
        require_once("./src/views/components/slider.php");
        ?>
    </div>
</section>

<section id="example-product-part">
    <h2>QUELQUES PRODUITS</h2>

    <div class="archive-products">
        
        <?php foreach($all_products as $product) : ?>
            <a href="./?page=product-details&product_id=<?=$product["id"]?>" class="product-card">
                <img src="<?=$product["img_url"]?>" alt="image d'un produit de la boutique ornament">
                <h3 class="product-name"><?=$product["product_name"]?></h3>
                <p class="category"><?=$product["category_name"]?></p>
                <p class="price"><?=$product["price"]?>€</p>
            </a>
        <?php endforeach; ?>

    </div>
    <a href="./?page=shop" class="btn">Voir plus</a>
</section>

<section id="about-part">
    <div class="head">
        <h2>À PROPOS</h2>
    </div>
    <div class="content first">
            <div class="bg-img">
                <span>L'HISTOIRE</span>
            </div>
            <div class="desc">
                <h3>L'histoire</h3>
                <p>
                Ornament est né d’une passion : celle de transformer les espaces de vie en véritables havres de paix. Tout a commencé dans un petit atelier en France, où des artisans talentueux imaginaient des objets et meubles uniques, alliant design moderne et respect des traditions françaises.<br><br>

Face à une époque où tout va trop vite, Ornament a décidé de ralentir et de privilégier la qualité et l'authenticité. Chaque pièce raconte une histoire, celle de créateurs passionnés et d’un savoir-faire local transmis de génération en génération.<br><br>

Aujourd’hui, Ornament s’engage à vous offrir des produits qui résonnent avec votre intérieur et votre style de vie, tout en soutenant l’artisanat français. Parce qu’être en paix avec son intérieur, c’est aussi célébrer ce qui nous rapproche.<br><br>
                </p>
            </div>
        </div>
        <div class="content second">
            <div class="desc">
                <h3>Made in france</h3>
                <p>
                Chez Ornament, nous croyons en l’importance de valoriser ce qui est fait près de chez nous. C’est pourquoi tous nos objets et meubles d’intérieur sont conçus et fabriqués en France.<br><br>

Chaque pièce est le fruit du savoir-faire exceptionnel de nos artisans locaux, qui mettent leur passion et leur expertise au service de créations uniques. En choisissant Ornament, vous soutenez non seulement l’artisanat français, mais aussi une production respectueuse de l’environnement, grâce à des circuits courts et une sélection rigoureuse de matériaux durables.<br><br>

Avec Ornament, vous apportez à votre intérieur non seulement du style, mais aussi une part d’histoire et de fierté locale. Parce qu’un intérieur en paix commence par des choix responsables.<br><br>
                </p>

            </div>
            <div class="bg-img">
                <span>MADE IN FRANCE</span>
            </div>
        </div>
</section>