<?php require "./ad_header.php"
?> 

        <!--Giao diện chỉnh sửa bên phải-->
        <div class="col-10 content">
          <h2 style="margin: 20px 0">QUẢN LÝ DANH MỤC</h2>
          <a class="add-category" href="#">Add new category</a>
          <table class="dmsp" border="1" padding="10px">
            <tr class="t-row">
              <th>ID</th>
              <th>Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>

            <?php 
            $getAllProtype = $protype->getAllProtype();
            foreach ($getAllProtype as $value) {
            ?>
            <tr>
              <td><?php echo $value['type_id']?></td>
              <td><?php echo $value['type_name']?></td>
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
