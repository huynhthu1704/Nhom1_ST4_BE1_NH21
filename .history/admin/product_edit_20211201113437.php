<?php include "header.php";
$Id = (int)$_GET['id'];
$getproductt = $product->getProductId($Id);
$getName = $getproductt[0]['name'];
$getManuId = $getproductt[0]['manu_id'];
$getTypeid = $getproductt[0]['type_id'];
$getPrice = $getproductt[0]['price'];
$getQuantity = $getproductt[0]['quantity'];
$getImage = $getproductt[0]['pro_image'];
$getDescription = $getproductt[0]['description'];
$getFeature = $getproductt[0]['feature'];
$getDiscount = $getproductt[0]['discount_id'];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="product1_edit.php?id=<?php echo $Id ?>" method="post" enctype="multipart/form-data">
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
                <input type="text" id="inputName" class="form-control" value="<?php echo $getName; ?>" name="name">
              </div>
              <div class="form-group">
                <label for="inputManufacture">Manufacture</label>
                <select id="inputManufacture" class="form-control custom-select" name="manu">
                  <?php
                  $getAllManu = $manufacture->getAllManufactures();
                  foreach ($getAllManu as $value) {
                    if ($value['manu_id'] == $getManuId) :
                  ?>
                      <option selected value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                    <?php else : ?>
                      <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                  <?php endif;
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProtype">Protype</label>
                <select id="inputProtype" class="form-control custom-select" name="type">
                  <?php
                  $getAllProtype = $protype->getAllProtypes();
                  foreach ($getAllProtype as $value) {
                    if ($value['type_id'] == $getTypeid) :
                  ?>
                      <option selected value=<?php echo $value['type_id'] ?>><?php echo $value['type_name'] ?></option>
                    <?php else : ?>
                      <option value=<?php echo $value['type_id'] ?>><?php echo $value['type_name'] ?></option>
                  <?php endif;
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputPrice">Price</label>
                <input type="text" id="inputPrice" class="form-control" value="<?php echo $getPrice; ?>" name="price">
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="desc"><?php echo $getDescription; ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputQuantity">Quantity</label>
                <input type="text" id="inputQuantity" class="form-control" value="<?php echo $getQuantity; ?>" name="quantity">
              </div>
              <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" class="form-control" value="<?php echo $getImage; ?>" name="image">
              </div>
              <div class="form-group">
                <label for="inputStatus">Feature</label>
                <select id="inputStatus" class="form-control custom-select" name="feature">
                  <?php
                  if ($getFeature == "0") :
                  ?>
                    <option selected value=0><?php echo "No" ?></option>
                    <option value=1><?php echo "Yes" ?></option>
                  <?php else : ?>                   
                    <option value=0><?php echo "No" ?></option>
                    <option selected value=1><?php echo "Yes" ?></option>
                  <?php endif;
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDiscount">Discount</label>
                <select id="inputDiscount" class="form-control custom-select" name="discount">
                  <?php
                  $getAllDiscount = $discount->getAllDiscount();
                  foreach ($getAllDiscount as $value) {
                    if ($value['id'] == $getDiscount) :
                  ?>
                      <option selected value=<?php echo $value['id'] ?>><?php echo $value['name'] ?></option>
                    <?php else : ?>
                      <option value=<?php echo $value['id'] ?>><?php echo $value['name'] ?></option>
                  <?php endif;
                  } ?>
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
          <a href="product.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update" class="btn btn-success float-right" name="submit">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>