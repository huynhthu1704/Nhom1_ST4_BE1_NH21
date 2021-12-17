<?php 
require "config.php";
require "models/db.php";
require "models/discount.php";
require "models/product.php";
$id = $_GET['id'];
$discount = new AM_Discount();
$products = new AM_Product();
$product = $products->getQuantilyByDiscount($id);
$check=0;
foreach($product as $values){
  if($check < (int)$values['quantity']){
    $check = (int)$values['quantity'];
  }
}
if (isset($_GET['id'])) {
  if($check==0){
    $discount->deleteDiscount($_GET['id']);
    echo "<script>alert('Delete successfully')</script>";
    echo "<script>window.location = 'discount.php'</script>";
  }else{
    echo "<script>alert('Delete fail, Product of this discount is still exists')</script>";
    echo "<script>window.location = 'discount.php'</script>";
  }
}else{
  echo "<script>window.location = 'discount.php'</script>";
}
?>