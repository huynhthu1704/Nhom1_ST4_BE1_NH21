<?php 
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
$product = new Product();
$protype = new Protype();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google font -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700"
      rel="stylesheet"
    />

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Admin</title>
  </head>
  <body>
    <!-- HEADER -->
    <header class="admin">
      <!-- MAIN HEADER -->
      <div class="admin-header">
        <div class="admin-logo">
          <a href="#" class="logo">
            <img src="./img/logo1.png" alt="" />
          </a>
          </div>

          <div class="logout">
            <span class="sb-icon"><i class="fas fa-power-off"></i></span>
            <span class="title"><a href="#">Đăng xuất</a></span>
          </div>
        </div>
      </div>
    </header>
    <!-- /HEADER -->

    <div class="container-fluid">
      <div class="row">
        <!--Side bar-->
        <div class="col-2 sidebar">
          <ul class="sidebar-list">
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fas fa-home"></i></span>
              <span class="title"><a href="./ad_qltv.php">Quản lý thành viên</a></span>
            </li>
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fas fa-list-alt"></i></span>
              <span class="title"><a href="./ad_qldm.php">Quản lý danh mục</a></span>
            </li>
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fas fa-mobile-alt"></i></span>
              <span class="title"><a href="./ad_qlsp.php">Quản lý sản phẩm</a></span>
            </li>
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fab fa-salesforce"></i></span>
              <span class="title"><a href="./ad_qlkm.php">Quản lý khuyến mãi</a></span>
            </li>
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fas fa-comments"></i></i></span>
              <span class="title"><a href="./ad_qlbl.php">Quản lý bình luận</a></span>
            </li>
            <li class="sidebar-item">
              <span class="sb-icon"><i class="fas fa-ad"></i></i></span>
              <span class="title"><a href="./ad_qlqc.php">Quản lý quảng cáo</a></span>
            </li>
          </ul>
        </div>