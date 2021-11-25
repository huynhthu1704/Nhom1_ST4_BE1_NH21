<?php 
require "config.php";
require "models/db.php";
require "models/product.php";
$id = $_GET['id'];
$product = new AM_Product();
if (isset($_GET['id'])) {
  $product->deleteProduct($id);
  header("location:product.php");
}
?>