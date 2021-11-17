<?php include "header.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">ID</th>
                      <th style="width: 15%">Name</th>
                      <th style="width: 15%">Image</th>
                      <th style="width: 15%">Price</th>
                      <th style="width: 10%">Manufacture</th>
                      <th style="width: 10%">Type</th>
                      <th style="width: 20%">Description</th>
                      <th style="width: 10%">Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
                  $products = $product->getAllProducts();
                  foreach ($products as $value) { ?>
                  <tr>
                      <td><?php echo $value['id'] ?></td>
                      <td><?php echo $value['name'] ?></td>
                      <td><img src="../img/<?php echo $value['pro_image'] ?>" style="background-color:inherit" width="80px" alt=""></td>
                      <td><?php echo number_format($value['price']) ?></td>
                      <td><?php echo $value['manu_name'] ?></td>
                      <td><?php echo $value['type_name'] ?></td>
                      <td style="width: 12%"><p  class="description"><?php echo ($value['description']) ?></p></td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm modify-icon" href="product-edit.php">
                              <i class="fas fa-pencil-alt ">
                              </i>
                              Edit
                          </a> <br>
                          <a class="btn btn-danger btn-sm modify-icon" onclick="" href="product-delete.php?id=<?php echo $value['id'] ?>">
                              <i class="fas fa-trash ">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php } ?>
               
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
    function pro_delete() {
        let result = confirm("Do you want to delete this product?");
        if (result == true) {
            <?php
            $product->deleteProduct($id);
            ?>
        }
    }
</script>
  <?php include "footer.php";?>