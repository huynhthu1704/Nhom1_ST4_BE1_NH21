<?php
require "models/db.php";
require "models/product.php";

$product = new Product();
if (isset($_GET['id'])) {
    $qty = $product->getQuantity($_GET['id']);
    echo $qty; 
} else {
    echo '0';
}