<?php include "header.php"; ?>
<div class="container">
      <div class="row px-5">
            <div class="col-md-8">
                  <div class="shopping-cart">
                        <h2 style="padding: 30px 0 0 0 !important">My Cart</h2>
                        <hr>
                        <?php
                        if ($count != 0) { ?>
                             foreach ($cart as $value) {
                    // $getProduct = $product->getProductById($value['id']);
                    // $subtotal += $getProduct[0]['price'];
                    $subtotal += $value['price']
                        <?php } ?>

                  </div>
            </div>
            <div class="col-md-4"></div>
      </div>

</div>

<?php include "footer.php"; ?>