<?php 
require "config.php";
require "models/product.php";
$id = $_GET['id'];
$product = new Product();
if (isset($_GET['id'])) {
  $product->deleteProduct($id);
  header("location:product.php");
}
?>