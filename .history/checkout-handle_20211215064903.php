<?php
require "models/db.php";
require "models/order_detail.php";
require "models/order_item.php";
require "models/product.php";
session_start();
$product = new Product();
$orderDetail = new OrderDetail();
if (isset($_POST['submit'])) {
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
    $order_id = 0;
    $order_id = $orderDetail->addOrder($firstname, $lastname, $email, $address, $city, $zipcode, $qty, $subtotal, $shipping_fee, $total, $tel, $customer_id, $note);
    if ($order_id !=  -1) {
        foreach ($_SESSION['cart'] as $value) {
            $orderItem = new OrderItem();
            $orderItem->addOrderItem($order_id, $value['id'], $value['name'], $value['image'], $value['price'], $value['qty']);
        }
        unset($_SESSION['cart']);
        echo "<script>alert('Your order is waiting for confirm. Thank for purchase')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    
}
