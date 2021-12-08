<?php include "header.php"; 
include "component.php";?>
<div class="container">
      <div class="row px-5">
            <div class="col-md-8">
                  <div class="shopping-cart">
                        <h2 style="padding: 30px 0 0 0 !important">My Cart</h2>
                        <hr>
                        <?php
                        if ($count != 0) {
                              foreach ($cart as $value) {
                                    // $getProduct = $product->getProductById($value['id']);
                                    // $subtotal += $getProduct[0]['price'];
                                    $subtotal += $value['price'] ;
                                    cartElement($value['id'], $value['image'], $value['name'], $value['price'], $value['qty']);?>
                          
                        <?php }} else {
                              ?> <h5>YOU HAVEN'T CHOOSE ANY PRODUCT</h5><?php
                        } ?>

                  </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white">
                  <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                              <div class="col-md-6">
                                    <?php if ($count != 0) {echo "<h4>PRICE $count ITEMS<h4>";}?>
                              </div>
                              <div class="col-md-6"></div>
                        </div>
                  </div>
            </div>
      </div>

</div>

<?php include "footer.php"; ?>