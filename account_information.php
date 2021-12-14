<?php include "header_account_information.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account Information</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Account Information</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Personal Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="register-handle.php" method="post" novalidate enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" name="First" class="form-control" value="<?php echo $customers[0]['first_name'] ?>" placeholder="First" pattern="([a-zA-Z]{3,}(\s?\w+))*" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" name="Last" class="form-control" value="<?php echo $customers[0]['last_name'] ?>" placeholder="Last" pattern="([a-zA-Z]{3,}(\s?\w+))*" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="text" class="form-control" name="Address" value="<?php echo $customers[0]['cus_address'] ?>" placeholder="Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">City</label>
                  <input type="text" class="form-control" name="City" value="<?php echo $customers[0]['city'] ?>" pattern="([a-zA-Z]{1,}(\s?\w+))*" placeholder="City">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Zip code</label>
                  <input type="text" class="form-control" name="zipcode" value="<?php echo $customers[0]['zip_code'] ?>" placeholder="Zip Code" pattern="([0-9]{6}){1}" required>
                </div>
                <div class="input-group mb-3">
                  <p>Ngày sinh:<input type="date" name="birthday" value="<?php echo strftime('%Y-%m-%d',strtotime($customers[0]['birthday'])) ?>" required></p>
                </div>
                <input type="radio" <?php if ($customers[0]['gender'] == "male") {
                                      echo "checked";
                                    } ?> name="gender" id="gender_male" value="male" checked> Male
                <input type="radio" <?php if ($customers[0]['gender'] == "female") {
                                      echo "checked";
                                    } ?> name="gender" id="gender_female" value="female"> Female
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="save" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <!-- Form Element sizes -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Email And Phone Number</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="Email" value="<?php echo $customers[0]['email'] ?>" pattern="\w{3,}[\.-]?\w+@\w+(\.\w{2,4})+" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Phone" value="<?php echo $customers[0]['phone_number'] ?>" placeholder="Phone number" pattern="[0-9]{10,11}" required>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="Update" class="btn btn-info">Update</button>
              </div>
            </form>
          </div>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">PassWord</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']  ?></p>
            <?php } ?>
            <form class="form-horizontal" action="ud-account.php" method="post" novalidate enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="current-password" class="form-control" placeholder="Current Password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="new-password" class="form-control" placeholder="New Password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Retype password</label>
                  <div class="col-sm-10">
                    <input type="password" name="retype-password" class="form-control" placeholder="Retype password" required>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
              </div>
              <!-- /.card-footer -->
            </form>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<script>
  const form = document.querySelector('form');
  form.onsubmit = (e) => {
    if (form.checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
    }
    form.classList.add('was-validated');
  };
</script>
<?php include "footer_account_information.php"; ?>