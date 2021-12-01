<?php include "header.php"; ?>
<div class="container-fluid">
      <div class="row px-5">
            <div class="col-md-7">
                  <div class="shopping-cart">
                        <h6>My Cart</h6>
                        <hr>
                        <?php
                        if ($count != 0) { ?>
                              <form action="cart.php" method="get">
                                    <div class="border rounded">
                                          <?php 
                                          foreach ($cart as $value) {
                                                $getProduct = $product->getProductById($value['pro_id']);
                                                $subtotal += $getProduct[0]['price'];
                                          ?>
                                          <div class="row bg-white">
                                                <div class="col-md-3">
                                                      <img src="./img/<?php echo $getProduct[0]['pro_image']; ?>" alt="" height="100" class="img">
                                                </div>
                                                <div class="col-md-6">
                                                      <h5 class="pt-2"><?php echo $getProduct[0]['name']?></h5>
                                                      <input type="number" name="qty" id="qty" value="<?php ?>">
                                                      <h5 class="pt-2"><?php echo number_format($getProduct[0]['price']) ?></h5>
                                                      <button type="submit" class="btn btn-danger" name="remove">Remove</button>
                                                </div>
                                                <div class="col-md-3">

                                                </div>
                                          </div>
                                          <?php  } ?>
                                    </div>
                              </form>
                        <?php } ?>

                  </div>
            </div>
            <div class="col-md-5"></div>
      </div>

</div>
<div class="container">
      <table id="cart" class="table table-hover table-borderless">
            <thead>
                  <tr>
                        <th style="width:4%"></th>
                        <th style="width:10%">Image</th>
                        <th style="width:40%">Name</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:5%">Delete </th>
                  </tr>
            </thead>
            <?php
            $new = $product->getNewProducts();
            foreach ($new as $value) {
            ?>
                  <tbody>
                        <tr>
                              <td><input type="checkbox" name="buy" id="buy"></td>
                              <td><img src="./img/<?php echo $value['pro_image']; ?>" alt="" width="100"></td>
                              <td>
                                    <h4><a href="#"><?php echo $value['name']; ?></a></h4>
                              </td>
                              <td><?php echo number_format($value['price']); ?> </td>
                              <td><input class="form-control text-center" value="1" type="number" min="0"></td>
                              <td class="text-center"><?php $value['price'] ?> </td>
                              <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                  </tbody>
            <?php } ?>
            <tfoot>
                  <tr>
                        <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue shopping</a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center"><strong>Total 500.000 đ</strong>
                        </td>
                        <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                        </td>
                  </tr>
            </tfoot>
      </table>
</div>
<?php include "footer.php"; ?>