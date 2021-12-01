<?php
session_start();
require "models/db.php";
require "models/product.php";
$products = new Product();

    if (isset($_GET['id'])) {
        $id = isset($_GET['id']);
        $product = $products->getAllProductsWithProtype($id);
        if (!isset($_SESSION['cart'])) {
            $cart[$id] = array (
                "name" => $product[0]['name'],
                "image" => $product[0]['pro_image'],
                "price" => $product[0]['price'],
                "qty" => 1
            );
        } else {
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array (
                    "name" => $product[0]['name'],
                    "image" => $product[0]['pro_image'],
                    "price" => $product[0]['price'],
                    "qty" => (int) $cart[$id]['qty'] + 1
                );
            } else {
                $cart[$id] = array (
                    "name" => $product[0]['name'],
                    "image" => $product[0]['pro_image'],
                    "price" => $product[0]['price'],
                    "qty" => 1
                );
            }
        }
        $_SESSION['cart'] = $cart;
        $total = $qty = 0;
        foreach ($cart as $value) {
            $total += $value['price'] + $value['qty'];
            $qty += $value['qty'];
        }
        echo $total."-".$qty;
    } 