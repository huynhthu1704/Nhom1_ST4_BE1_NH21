<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new AM_Product();
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
        echo "<script>alert('Add successfully')</script>";
    } else {
        echo "<script>alert('Add failed')</script>";  
    }
    //upload hinh
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    echo "<script>window.location = 'product.php'</script>";
} else {
    echo "<script>window.location = 'product.php'</script>";
}
