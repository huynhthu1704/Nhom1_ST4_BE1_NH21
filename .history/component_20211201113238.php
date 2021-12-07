<?php
function component($pro_image, $type_name, $id, $name, $price)
{
    echo "
        <div class=\"product\">
      
            <div class=\"product-img\">
                <img src=\".\img\\$pro_image\" alt=\"\">
            </div>
            <div class=\"product-body\">
                <p class=\"product-category\">$type_name</p>
                <h3 class=\"product-name\"><a href=\"detail.php?id=$id\">$name</a></h3>
                <h4 class=\"product-price\">".number_format($price)."</h4>
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
