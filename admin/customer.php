<?php include "header.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
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
              <th style="width: 5%">First Name</th>
              <th style="width: 10%">Last Name</th>
              <th style="width: 15%">Email</th>
              <th style="width: 15%">Adddress</th>
              <th style="width: 5%">City</th>
              <th style="width: 5%">Zip code</th>
              <th style="width: 10%">Number Phone</th>
              <th style="width: 4%">Gender</th>
              <th style="width: 15%">Birthday</th>
              <th style="width: 15%">Join Day</th>
              <th style="width: 10%">Username</th>
              <th style="width: 10%">Pass</th>
            </tr>
          </thead>
          <tbody>
            <form action="edit_product.php" method="post" enctype="multipart/form-data">
              <?php
              $customer = $customer->getAllCustomer();
              foreach ($customer as $value) { ?>
                <tr>
                  <td><?php echo $value['id'] ?></td>
                  <td><?php echo $value['first_name'] ?></td>
                  <td><?php echo $value['last_name'] ?></td>
                  <td><?php echo $value['email'] ?></td>
                  <td><?php echo $value['cus_address'] ?></td>
                  <td><?php echo $value['city'] ?></td>
                  <td><?php echo $value['zip_code'] ?></td>
                  <td><?php echo $value['phone_number'] ?></td>
                  <td><?php echo $value['gender'] ?></td>
                  <td><?php echo $value['birthday'] ?></td>
                  <td><?php echo $value['join_day'] ?></td>
                  <td><?php echo $value['username'] ?></td>
                  <td><?php echo $value['pwd'] ?></td>
                </tr>
              <?php } ?>
            </form>
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
<?php include "footer.php"; ?>