<?php 
require "config.php";
require "models/db.php";
require "models/product.php";
$id = $_GET['id'];
$product = new AM_Product();
if (isset($_GET['id'])) {
  if($product->deleteProduct($id)){
    echo "<script>alert('Delete successfully')</script>";
    echo "<script>window.location = 'product.php'</script>";
  }else{
    echo "<script>alert('Delete fail')</script>";
    echo "<script>window.location = 'product.php'</script>";
  }
}
?>