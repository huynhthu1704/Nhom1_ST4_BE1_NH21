<?php include "header.php";
include "component.php"; ?>
<div class="container">
      <div class="row px-5">
            <div class="col-md-8">
                  <div class="shopping-cart">
                        <h2 style="padding: 30px 0 0 0 !important">My Cart</h2>
                        <hr>
                        <?php
                        if ($count != 0) {
                              foreach ($_SESSION['cart'] as $value) {
                                    cartElement($value['id'], $value['image'], $value['name'], $value['price'], $value['qty']);
                              }
                        } else {
                        ?> <h5>YOU HAVEN'T CHOOSE ANY PRODUCT</h5>
                        <?php } ?>

                  </div>
            </div>
            <?php if ($count != 0) {?>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white" style="padding: 30px 0 0 0 !important">
                  <div class="pt-4" id="price-detail">
                        <h2>Price Details</h2>
                        <hr>
                        <div class="row price-details">
                              <div class="col-md-6">
                                    <h4>Price (<span id="price-detail-subtotal"><?php echo $count ?></span> items)</h4>
                                    <h4>Delivery fee:</h4>
                                    <hr>
                                    <h4>Total:</h4>
                              </div>
                              <div class="col-md-6">
                                    <h4 id="price-detail-subtotal"><?php echo number_format($subtotal); ?> VND</h4>
                                    <h4 class="text-success">FREE</h4>
                                    <hr>
                                    <h4 id="price-detail-total"><?php echo number_format($total) ?> VND</h4>
                              </div>
                        </div>
                        <button class="btn btn-danger button-modify"><a href="checkout.php">PLACE ORDER</a></button>
                  </div>
            </div>
            <?php } ?>
      </div>

</div>

<?php include "footer.php"; ?>