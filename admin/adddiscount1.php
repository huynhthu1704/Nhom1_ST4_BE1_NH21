<?php 
require "config.php";
require "models/discount.php";
$discount = new AM_Discount();
///Xử lý add
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $discount_percent=$_POST['discount_percent'];
    $active=$_POST['active'];
    $start_day=$_POST['start_day'];
    $end_day=$_POST['end_day'];

   if($discount->addDiscount($name,$discount_percent,$active,$start_day,$end_day)==true){
        echo "đã thêm dc";
   }else{
       echo "ko duoc";
   }

}