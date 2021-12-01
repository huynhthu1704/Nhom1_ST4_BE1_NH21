<?php
session_start();
require "models/db.php";
require "models/product.php";
$products = new Product();

    if (isset($GET['id'])) {
        $id = isset($GET['id']);
        $product = $products->getAllProductsWithProtype($id);
        if (isset($_SESSION['cart'])) {
            $cart[$id] = array (
                "name" => $product[1],
                "image" => $product[4],
                "price" => $product[6],
                "qty" => 1
            );
        } else {
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array (
                    "name" => $product[1],
                    "image" => $product[4],
                    "price" => $product[6],
                    "qty" => (int) $cart[$id]['qty'] + 1
                );
            } else {
                $cart[$id] = array (
                    "name" => $product[1],
                    "image" => $product[4],
                    "price" => $product[6],
                    "qty" => 1
                );
            }
        }
        $_SESSION['cart'] = $cart;
        echo "<prE>";
        echo ($_SESSION['cart']) ;
    }
    echo "hi";