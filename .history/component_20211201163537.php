<?php
function component($pro_image, $discount_percent, $isNew, $type_name, $id, $name, $discount_price, $old_price)
{
    $percent = $discount_percent == 0 ? "" :  "<span class=\"sale\">- " . $discount_percent . "%</span>";
    $new = $isNew == 1 ? "<span class=\"new\">NEW</span>" : "";
    $price = $discount_price == 0 ?
        "<h4 class=\"product-price\">" . number_format($old_price) . "</h4>"
        :  "<h4 class=\"product-price\">" . number_format($discount_price) . "<del class=\"product-old-price\">" . number_format($old_price) . "</del></h4>";
    echo "
        <div class=\"product\">
      
            <div class=\"product-img\">
                <img src=\".\img\\$pro_image\" alt=\"\">
                <div class=\"product-label\">"
                            .$percent.
                            $new."
                                </div>
            </div>
            <div class=\"product-body\">
                <p class=\"product-category\">$type_name</p>
                <h3 class=\"product-name\"><a href=\"detail.php?id=$id\">$name</a></h3>
                ".$price."
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

function getProduct ($arr, $newPro){
    foreach ($arr as $value) {
        $isNew = 0;
        foreach ($newPro as $value1) {
            if ($value['id'] == $value1['id']) {
                $isNew = 1;
            }
        }
        $price= (int) $value['price'];
        $dis_Percent = 0;
        $discount_price = 0;
        if ($discount->getDiscountByID(($value['discount_id']))) {
            $dis_Percent= (int) $discount->getDiscountByID(($value['discount_id']))[0]['dis_percent'];
            $discount_price=(int) ($price - $price * $dis_Percent/100);
        }
        component($value['pro_image'], $dis_Percent, $isNew, $value['type_name'], $value['id'], $value['name'],$discount_price,  $value['price']);
    }
}

