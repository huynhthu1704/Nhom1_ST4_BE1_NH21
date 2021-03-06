<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<?php $first = $last = $phone = $email = $address = $gender = $username = $pass = $city = $ZipCode= ""; ?>

<body class="hold-transition register-page">
  <div class="register-box">
  <div class="login-logo">
      <a href="index.php"><img src="./img/logo1.png" alt=""></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="register-handle.php" method="post" novalidate>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']  ?></p>
        <?php } ?>
          <div class="input-group mb-3">
            <input type="text" name="first" class="form-control" value="<?php echo $first; ?>" placeholder="First name" pattern="[a-zA-Z]{3,}(\s?\w+)*"  required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="last" class="form-control" value="<?php echo $last; ?>" placeholder="Last name" pattern="([a-zA-Z]{3,}(\s?\w+))*" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone number" pattern="[0-9]{10,11}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Address">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" pattern="([a-zA-Z]{1,}(\s?\w+))*" placeholder="City">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" name="zipcode" class="form-control" value="<?php echo $ZipCode; ?>" pattern="([0-9]{6}){1}" placeholder="Zip Code">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" pattern="\w{3,}[\.-]?\w+@\w+(\.\w{2,4})+" title="Ph???i c?? k?? t??? @ ." required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="user" class="form-control" value="<?php echo $username; ?>" placeholder="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id ="pass" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="retype-password" class="form-control" placeholder="Retype password"  required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <input type="radio" name="gender" id="gender_male" value="male" checked> Male
          <input type="radio" name="gender" id="gender_female" value="female"> Female
          <div class="input-group mb-3">
            <p>Ng??y sinh:<input type="date" name="birthday" required></p>
          </div>
          <div class="noti"></div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
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
        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
</body>

</html>