<?php
require "congig.php";
require "models/session_cart.php";
require "models/session_cart_detail.php";
$ssCart = new SessionCart();
$ssCartDetail = new SessionCartDetail();
session_start(); 
if (isset($_SESSION['cart'])) {
   $idSS = $ssCart->addSSCart($_SESSION['id']);
   foreach ($_SESSION['cart'] as $key=>$value) {
       if ($ssCartDetail->addSSCartDetail($idSS, $value['qty'], $value['qty'])) {
           echo "hihi";
       }
   }
}
session_destroy();
header("location:login.php");