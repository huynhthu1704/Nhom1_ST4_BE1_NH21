<?php include "header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="product_add1.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="inputManufacture">Manufacture</label>
                <select id="inputManufacture" class="form-control custom-select" name="manu">
                 <?php 
                 $getAllManu = $manufacture->getAllManufactures();
                 foreach($getAllManu as $value){
                 ?>
                 <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                 <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProtype">Protype</label>
                <select id="inputProtype" class="form-control custom-select" name="type">
                  <?php 
                   $getAllProtype = $protype->getAllProtypes();
                  foreach($getAllProtype as $value){
                  ?>
                  <option value=<?php echo $value['type_id'] ?>><?php echo $value['type_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputPrice">Price</label>
                <input type="number" id="inputPrice" class="form-control" name="price">
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="desc"></textarea>
              </div>
              <div class="form-group">
                <label for="inputQuantity">Quantity</label>
                <input type="number" id="inputQuantity" class="form-control" name="quantity">
              </div>
              <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="form-group">
                <label for="inputFeature">Feature</label>
                <select id="inputFeature" class="form-control custom-select" name="feature" >
                  <option value="0">0</option>
                  <option value="1">1</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDiscount">Discount</label>
                <select id="inputDiscount" class="form-control custom-select" name="discount">
                  <?php 
                   $getAllDiscount = $discount->getAllDiscount();
                  foreach($getAllDiscount as $value){
                  ?>
                  <option value=<?php echo $value['dis_id'] ?>><?php echo $value['dis_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Add new Product" class="btn btn-success float-right" name="submit">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include "footer.php"; ?>
