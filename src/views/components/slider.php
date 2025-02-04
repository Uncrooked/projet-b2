<div class="slider-products">
    <ul class="container-img">

        <?php
            $cpt = 0;
            foreach($sliderData as $data){
                switch($cpt){
                    case 0 :
                        $className = "previous";
                        break;
                    case 1 :
                        $className = "current";
                        break;
                    case 2 :
                        $className = "next";
                        break;
                    default:
                        $className = "other";
                        break;
                }

                echo "
                <li class='$className'>
                    <a href='./?page=product-details&product_id=".$data["id"]."'>
                        <img src='".$data["img_url"]."' alt='slider product img' class='image-product'>
                    </a>
                </li>
                ";
                $cpt++;
            }
        ?>

    </ul>

    <div class="slider-nav">
        <span class="arrow left"><img src="./public/assets/img/logos/arrow.svg" alt="slider-arrow products" class="first"></span>  
            <ul>
                <li class="bullet"></li>
                <li class="bullet"></li>
                <li class="bullet"></li>
            </ul> 
        <span class="arrow right"><img src="./public/assets/img/logos/arrow.svg" alt="slider-arrow products" class="second"></span> 
    </div>
</div>