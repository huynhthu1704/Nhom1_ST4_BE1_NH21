<?php
require "config.php";
require "models/product.php";
$product = new Product();
///Xử lý add
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];
    $feature = $_POST['feature'];
    $discount = $_POST['discount'];
    if ($product->addProducts($name, $manu_id, $type_id, $price, $quantity, $image, $desc, $feature, $discount) == true) {
        header("location:product.php");
    } else {
        header("location:product_add1.php");
    }
    //upload hinh
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
