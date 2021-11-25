<?php
require "config.php";
require "models/db.php";
require "models/discount.php";
$manufacture = new AM_Discount();
///Xử lý add
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $discount_percent = $_POST['discount_percent'];
  $active = $_POST['active'];
  $start_day = $_POST['start_day'];
  $end_day = $_POST['end_day'];
 

  if ($manufacture->editDiscount($id, $name, $discount_percent, $active, $start_day, $end_day) ==
   true) {
   header("location: discount.php");
  } else {
    echo "ko duoc";
  }
}
