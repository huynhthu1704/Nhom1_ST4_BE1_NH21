<?php include "header.php";
$discount_id = isset($_GET['id'])? $_GET["id"] : "";
echo $discount_id;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Discount</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Discount</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="discount_edit1.php?id=<?php echo $discount_id?>" method="post" enctype="multipart/form-data">
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
                <label for="inputClientCompany">Discount Percent</label>
                <input type="text" id="inputClientCompany" class="form-control" name="discount_percent">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Active</label>
                <input type="text" id="inputClientCompany" class="form-control" name="active">
              </div>
              <div class="form-group">
                <label for="inputQuantity">Start Day</label>
                <input type="date" id="inputQuantity" class="form-control" name="start_day">
              </div>
              <div class="form-group">
                <label for="inputQuantity">End Day</label>
                <input type="date" id="inputQuantity" class="form-control" name="end_day">
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
          <input type="submit" value="Edit now" class="btn btn-success float-right" name="submit">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>