<?php include "header.php"; ?>
<div class="container">
      <div class="row px-5">
            <div class="col-md-8">
                  <div class="shopping-cart">
                        <h2 style="padding: 30px 0 0 0 !important">My Cart</h2>
                        <hr>
                        <?php
                        if ($count != 0) { ?>
                              <form action="cart.php" method="get">
                                    <div class="border rounded">
                                          <?php 
                                          foreach ($cart as $value) {
                                                $getProduct = $product->getProductById($value['id']);
                                                // $subtotal += $getProduct[0]['price'];
                                               // $subtotal += $value['price']
                                          ?>
                                          <div id="p<?php ?>" class="row bg-white cart-row-modify">
                                                <div class="col-md-3">
                                                      <img src="./img/<?php echo $value['pro_image']; ?>" alt="" height="100" class="img">
                                                </div>
                                                <div class="col-md-6">
                                                      <h4 class="pt-2"><?php echo $getProduct[0]['name']?></h4>
                                                      <h5 class="pt-2"><?php echo number_format($getProduct[0]['price']) ?></h5>
                                                      <button type="submit" class="btn btn-danger" name="remove" onclick="deleteProduct($value['id'])">Remove</button>
                                                </div>
                                                <div class="col-md-3">
                                                      <div>
                                                            <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-minus"></i></button>
                                                            <input type="text" value="<?php echo $value['qty'] ?>" class="form-control qty-modify" >
                                                            <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-plus"></i></button>
                                                      </div>
                                                </div>
                                          </div>
                                          <?php  } ?>
                                    </div>
                              </form>
                        <?php } ?>

                  </div>
            </div>
            <div class="col-md-4"></div>
      </div>

</div>

<?php include "footer.php"; ?>