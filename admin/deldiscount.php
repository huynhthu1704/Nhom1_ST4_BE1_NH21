<?php 
require "config.php";
require "models/db.php";
require "models/discount.php";

$discount = new AM_Discount();
if (isset($_GET['id'])) {
  $discount->deleteDiscount($_GET['id']);
}
header('location:discount.php');
?>