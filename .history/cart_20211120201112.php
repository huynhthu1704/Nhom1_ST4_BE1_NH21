<?php include "header.php"; ?>
<div class="container">
      <table id="cart" class="table table-hover table-borderless">
            <thead>
                  <tr>
                        <th style="width:2%"></th>
                        <th style="width:10%">Image</th>
                        <th style="width:40%">Name</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Thành tiền</th>
                        <th style="width:5%">Delete </th>
                  </tr>
            </thead>
            <?php
            $new = $product->getNewProducts();
            foreach ($new as $value) {
            ?>
                  <tbody>
                        <tr>
                              <td><input style="font-size: 20px;" type="checkbox" name="buy" id="buy"></td>
                              <td><img src="./img/<?php echo $value['pro_image']; ?>" alt="" width="100"></td>
                              <td><h4><a href="#"><?php echo $value['name']; ?></a></h4></td>
                              <td><?php echo number_format($value['price']); ?> </td>
                              <td><input class="form-control text-center" value="1" type="number" min="0"></td>
                              <td class="text-center"><?php $value['price'] ?> </td>
                              <td ><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></td>
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