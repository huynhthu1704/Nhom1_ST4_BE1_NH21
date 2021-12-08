<?php
session_start();
include "config.php";
include "models/db.php";
include "models/product.php";
include "models/manufacture.php";
include "models/protype.php";
include "models/discount.php";

$product = new AM_Product();
$manufacture = new AM_Manufacture();
$protype = new AM_Protype();
$discount = new AM_Discount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin 3T Mobile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link" style="text-align: center;">
        <img src="../img/logo1.png" alt="">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <div class="info">
            <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>
              <a href="#" class="d-block"><?php echo "Hello! " . $_SESSION['user_name'] ?></a>
            <?php } else { ?>
              <?php header("location: login.php") ?>
            <?php } ?>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="protype.php" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p> Product Type</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="protype.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Protype</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="protype_add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Protype</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="product.php" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p> Product</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="product.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="product_add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="discount.php" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p> Discount</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="discount.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Discount</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="discount_add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Discount</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="manufacture.php" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p> Manufacture</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="manufacture.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Manufacture</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manufacture_add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Manufacture</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>