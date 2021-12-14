<?php
session_start();
require "models/db.php";
require "models/product.php";
$products = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $products->getProductById($id);
    if (!isset($_SESSION['wishlist'])) {
        $wishlist[$id] = array(
            "id" => $product[0]['id'],
            "name" => $product[0]['name'],
            "image" => $product[0]['pro_image'],
            "price" => $product[0]['price'],
        );
    } else {
        $wishlist = $_SESSION['wishlist'];
        if (array_key_exists($id, $wishlist)) {
            $cart[$id] = array(
                "id" => $product[0]['id'],
                "name" => $product[0]['name'],
                "image" => $product[0]['pro_image'],
                "price" => $product[0]['price'],
            );
        } else {
            $wishlist[$id] = array(
                "id" => $product[0]['id'],
                "name" => $product[0]['name'],
                "image" => $product[0]['pro_image'],
                "price" => $product[0]['price'],
            );
        }
    }
    $_SESSION['wishlist'] = $wishlist;
    $totalPro = count($_SESSION['wishlist']);
    echo $totalPro;
}
