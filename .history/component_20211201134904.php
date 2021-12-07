<?php
function component($pro_image, $discount_percent, $isNew, $type_name, $id, $name , $discount_price, $price)
{
    $percent = $discount_percent == 0? "" :  "<span class=\"sale\">- ".$discount_percent."%</span>";
    $new = $isNew == 1? "<span class=\"new\">NEW</span>" : "";
    echo "
        <div class=\"product\">
      
            <div class=\"product-img\">
                <img src=\".\img\\$pro_image\" alt=\"\">
                <div class=\"product-label\">
                                   $percent
                               $new
                                </div>
            </div>
            <div class=\"product-body\">
                <p class=\"product-category\">$type_name</p>
                <h3 class=\"product-name\"><a href=\"detail.php?id=$id\">$name</a></h3>
                <h4 class=\"product-price\">".number_format($discount_price)."<del class=\"product-old-price\">".number_format($price)."</del></h4>
                <div class=\"product-rating\">
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                </div>
                <div class=\"product-btns\">
                    <button class=\"add-to-wishlist\"><i class=\"fa fa-heart-o\"></i><span class=\"tooltipp\">add to wishlist</span></button>
                </div>
            </div>
            <div class=\"add-to-cart\">
                <button onclick=\"addCart($id)\" name=\"add-to-cart\" class=\"add-to-cart-btn\"><i class=\"fa fa-shopping-cart\"></i> add to cart</button>
            </div>
            <input type=\"hidden\" name=\"pro_id\" value=\"$id\"></input>
            
        </div>";
   
}
