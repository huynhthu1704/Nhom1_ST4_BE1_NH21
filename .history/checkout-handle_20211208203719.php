<?php
require "models/db.php";
require "models/order_detail.php";
$orderDetail = new OrderDetail();
if (isset($_POST['submit'])) {
    echo "hi";
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zip-code'];
    $tel = $_POST['tel'];
    $note = $_POST['note'];
    $qty = $_POST['quantity'];
    $shipping_fee = $_POST['shipping-fee'];
    $subtotal = $_POST['subtotal'];
    $total = $_POST['total'];
    $customer_id = $_POST['customer-id'];

   $orderDetail->addOrder($firstname, $lastname, $email, $address, $city, $zipcode, $qty, $subtotal, $shipping_fee, $total, $tel, $customer_id, $note);
      
   // $note = $_POST['note'];
    echo $firstname."<br>";
    echo $lastname."<br>";
    echo $email."<br>";
    echo $address."<br>";
    echo $city."<br>";
    echo $subtotal."<br>";
    echo $qty."<br>";
    echo $note."<br>";
    echo $zipcode."<br>";
    echo $shipping_fee."<br>";
    echo $total."<br>";
    echo $customer_id."<br>";
 
}