<?php include "header.php"; ?>
<div class="container">
      <table id="cart" class="table table-hover table-borderless table-modify">
            <thead>
                  <tr>
                        <th style="width:2%"></th>
                        <th style="width:50%">Image</th>
                        <th style="width:50%">Name</th>
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
                              <td><input type="checkbox" name="buy" id="buy"></td>
                              <td><img src="./img/<?php echo $value['pro_image']; ?>" alt="" width="100"></td>
                              <td data-th="Product">
                                    <div class="row">
                                          <div class="col-sm-2 hidden-xs">
                                          </div>
                                          <div class="col-sm-10">
                                                <h4 class="nomargin"><a href="#"><?php echo $value['name']; ?></a></h4>
                                                <p>Mô tả của sản phẩm 1</p>
                                          </div>
                                    </div>
                              </td>
                              <td data-th="Price"><?php echo number_format($value['price']); ?> </td>
                              <td data-th="Quantity"><input class="form-control text-center" value="1" type="number" min="0">
                              </td>
                              <td data-th="Subtotal" class="text-center"><?php $value['price'] ?> </td>
                              <td class="actions" data-th="">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                    </button>
                              </td>
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