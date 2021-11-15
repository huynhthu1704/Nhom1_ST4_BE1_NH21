<?php include "./ad_header.php" ?>

        <!--Giao diện chỉnh sửa bên phải-->
        <div class="col-10 content">
          <h2 style="margin: 20px 0">QUẢN LÝ SẢN PHẨM</h2>
          <a class="add-category" href="#">Add new category</a>
          <table class="dmsp" border="1" padding="10px">
            <tr class="t-row">
              <th>ID</th>
              <th>Name</th>
              <th>Manu</th>
              <th>Type</th>
              <th>Price</th>
              <th>Image</th>
              <th>Desc</th>
              <th>Feature</th>
              <th>Create at</th>
              <th>Promotion</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>

            <?php 
            $getAllProducts = $product->getAllProducts();
            foreach ($getAllProducts as $value) {
            ?>
            <tr>
              <td><?php echo $value['id']?></td>
              <td><?php echo $value['name']?></td>
              <td><?php echo $value['manu_id']?></td>
              <td><?php echo $value['type_id']?></td>
              <td><?php echo number_format($value['price'])?></td>
              <td><p class="desc"><?php echo $value['pro_image']?></p> </td>
              <td> <p class="desc"><?php echo $value['description']?></p></td>
              <td><?php echo $value['feature']?></td>
              <td><?php echo $value['created_at']?></td>
              <td><?php echo $value['promotion_id']?></td>
              <td><a class="edit" href=""><i class="far fa-edit"></a></i></td>
              <td><a class="delete" href=""><i class="far fa-trash-alt"></i></a></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
