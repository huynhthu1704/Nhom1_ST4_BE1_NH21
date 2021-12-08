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
                                    $subtotal += $value['price'] ;
                                    cartElement($value['id'], $value['image'], $value['name'], $value['price'], $value['qty']);?>
                          
                        <?php }} else {
                              ?> <h5>YOU HAVEN'T CHOOSE ANY PRODUCT</h5><?php
                        } ?>

                  </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white"  style="padding: 30px 0 0 0 !important" >
                  <div class="pt-4">
                        <h2>Price Details</h2>
                        <hr>
                        <div class="row price-details">
                              <div class="col-md-6">
                                    <?php if ($count != 0) {echo "<h4>Price ( $count items)<h4>";}?>
                                    <h4>Delivery fee:</h4>
                                    <hr>
                                    <h4>Total:</h4>
                              </div>
                              <div class="col-md-6">
                                    <h4><?php echo $subtotal; ?></h4>
                                    <h4 class="text-success">FREE</h4>
                                    <hr>
                                    <h4><?php echo number_format($subtotal) ?></h4>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>

<?php include "footer.php"; ?>