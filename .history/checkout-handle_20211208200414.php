<?php
if (isset($_POST['submit'])) {
    echo "hi";
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zip-code'];
    $note = $_POST['note'];
    $qty = $_POST['quantity'];
    $shipping_fee = $_POST['shipping_fee'];
    $subtotal = $_POST['subtotal'];
    $total = $_POST['total'];
   // $note = $_POST['note'];
    echo $firstname."<br>";
    echo $lastname."<br>";
    echo $email."<br>";
    echo $address."<br>";
    echo $city."<br>";
    echo $subtotal."<br>";
    echo $qty."<br>";
    echo $note."<br>";
}
