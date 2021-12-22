<?php
require "config.php";
require "models/db.php";
require "models/manufacture.php";
require "models/product.php";
$products = new AM_Product();
$id = $_GET['manu_id'];
$manufacture = new AM_Manufacture();
$product = $products->getQuantilyByManu($id);
$check = 0;
foreach ($product as $values) {
  if ($check < (int)$values['quantity']) {
    $check = (int)$values['quantity'];
  }
}
if (isset($_GET['manu_id'])) {
  if ($check == 0) {
    $manufacture->deleteManufactures($id);
    echo "<script>alert('Delete successfully')</script>";
    echo "<script>window.location = 'manufacture.php'</script>";
  } else {
    echo "<script>alert('Delete failed, Product of this manufacture is still exists')</script>";
    echo "<script>window.location = 'manufacture.php'</script>";
  }
}else{
  echo "<script>window.location = 'manufacture.php'</script>";
}
