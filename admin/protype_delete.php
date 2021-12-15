<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
require "models/product.php";
$id = $_GET['type_id'];
$protype = new AM_Protype();
$products = new AM_Product();
$product = $products->getQuantilyByTypeId($id);
$check=0;
foreach($product as $values){
  if($check < (int)$values['quantity']){
    $check = (int)$values['quantity'];
  }
}
if (isset($_GET['type_id'])) {
  if ($check == 0) {
    $protype->deleteProtype($id);
    echo "<script>alert('Delete successfully')</script>";
    echo "<script>window.location = 'protype.php'</script>";
  } else {
    echo "<script>alert('Delete fail')</script>";
    echo "<script>window.location = 'protype.php'</script>";
  }
}else{
  echo "<script>window.location = 'protype.php'</script>";
}
