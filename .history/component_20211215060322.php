<?php

use function PHPSTORM_META\elementType;

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
        . $percent .
        $new . "
                                </div>
            </div>
            <div class=\"product-body\">
                <p class=\"product-category\">$type_name</p>
                <h3 class=\"product-name name-modify\"><a href=\"detail.php?id=$id\">$name</a></h3>
                " . $price . "
                <div class=\"product-rating\">
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                </div>
                <div class=\"product-btns\">
                    <button onclick=\"addToWishlist($id)\" class=\"add-to-wishlist\"><i class=\"fa fa-heart-o h$id\"></i><span class=\"tooltipp\">add to wishlist</span></button>
                </div>
            </div>
            <div class=\"add-to-cart\">
                <button onclick=\"addCart($id)\" name=\"add-to-cart\" class=\"add-to-cart-btn\"><i class=\"fa fa-shopping-cart\"></i> add to cart</button>
            </div>
            <input type=\"hidden\" name=\"pro_id\" value=\"$id\"></input>
            
        </div>";
}

function getProduct($value, $getNewProducts, $discount)
{
    $isNew = 0;
    foreach ($getNewProducts as $value1) {
        if ($value['id'] == $value1['id']) {
            $isNew = 1;
        }
    }
    $price = (int) $value['price'];
    $dis_Percent = 0;
    $discount_price = 0;
    if ($discount->getDiscountByID(($value['discount_id']))) {
        $dis_Percent = (int) $discount->getDiscountByID(($value['discount_id']))[0]['dis_percent'];
        $discount_price = (int) ($price - $price * $dis_Percent / 100);
    }
    component($value['pro_image'], $dis_Percent, $isNew, $value['type_name'], $value['id'], $value['name'], $discount_price,  $value['price']);
}

function cartElement($id, $img, $name, $price, $qty)
{
    echo "<form action=\"cart.php?action=remove&pid=$id\" method=\"post\">
        <div class=\"border rounded\">
                    <div class=\"row bg-white cart-row-modify\">
                          <div class=\"col-md-3\">
                                <img src=\".\img\\$img\" alt=\"\" height=\"100\" class=\"img\">
                          </div>
                          <div class=\"col-md-6\">
                                <h4 class=\"pt-2\">$name</h4>
                                <h5 class=\"pt-2\">" . number_format($price) . "</h5>
                                <button type=\"submit\" class=\"btn btn-danger\" name=\"remove\">Remove</button>
                          </div>
                          <div class=\"col-md-3\">
                                <div>
                                      <button type=\"button\" onclick=\"decreaseQty($id)\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-minus\"></i></button>
                                      <input type=\"text\" id=\"p$id\" value=\"$qty\" class=\"form-control qty-modify\">
                                      <button type=\"button\" onclick=\"increaseQty($id)\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
                                </div>
                          </div>
                    </div>
        </div>
  </form>";
}

function wishlistElement($id, $img, $name, $price)
{
    echo "<div class=\"border rounded\" id =\"wl$id\">
                    <div class=\"row bg-white cart-row-modify\">
                          <div class=\"col-md-3\">
                                <img src=\".\img\\$img\" alt=\"\" height=\"100\" class=\"img\">
                          </div>
                          <div class=\"col-md-6\">
                                <h4 class=\"pt-2\"><a href=\"detail.php?id=$id\">$name</a></h4>
                                <h5 class=\"pt-2\">" . number_format($price) . "</h5>
                                <button type=\"button\" onclick=\"removeProductFrWL($id)\" class=\"btn btn-danger\" name=\"remove-product\">Remove</button>
                                <button type=\"button\" onclick=\"addCart($id)\" class=\"btn btn-success\" name=\"add-to-cart\">Add to cart</button>
                          </div>
                    </div>
        </div>";
}
// function wishlistElement($id, $img, $name, $price)
// {
//     echo \"<form action=\"wishlist.php?action=remove-product&pid=$id\" method=\"post\">
//         <div class=\"border rounded p$id\">
//                     <div class=\"row bg-white cart-row-modify\">
//                           <div class=\"col-md-3\">
//                                 <img src=\".\img\\$img\" alt=\"\" height=\"100\" class=\"img\">
//                           </div>
//                           <div class=\"col-md-6\">
//                                 <h4 class=\"pt-2\"><a href=\"detail.php?id=$id\">$name</a></h4>
//                                 <h5 class=\"pt-2\">" . number_format($price) . "</h5>
//                                 <button type=\"submit\" onclick=\"removeProductFrWL($id)\" class=\"btn btn-danger\" name=\"remove-product\">Remove</button>
//                                 <button type=\"button\" onclick=\"addCart($id)\" class=\"btn btn-success\" name=\"add-to-cart\">Add to cart</button>
//                           </div>
//                     </div>
//         </div>
//   </form>";
// }
