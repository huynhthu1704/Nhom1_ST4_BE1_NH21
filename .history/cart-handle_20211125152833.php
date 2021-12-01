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
                "id" => $product[0]['id'],
                "name" => $product[0]['name'],
                "image" => $product[0]['pro_image'],
                "price" => $product[0]['price'],
                "qty" => 1
            );
        } else {
            $cart = $_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array (
                    "id" => $product[0]['id'],
                    "name" => $product[0]['name'],
                    "image" => $product[0]['pro_image'],
                    "price" => $product[0]['price'],
                    "qty" => (int) $cart[$id]['qty'] + 1
                );
            } else {
                $cart[$id] = array (
                    "id" => $product[0]['id'],
                    "name" => $product[0]['name'],
                    "image" => $product[0]['pro_image'],
                    "price" => $product[0]['price'],
                    "qty" => 1
                );
            }
        }
        $element = "<div class=\"product-widget\">
        <div class=\"product-img\">
           
        </div>
        <div class=\"product-body\">
            <h3 class=\"product-name\"><a href=\"detail.php?id=$cart[$id]['id']\">$cart[$id]['name']</a></h3>
            <h4 class=\"product-price\"><span class=\"qty\">$cart[$id]['qty'] x </span>".number_format($cart[$id]['price'])."</h4>
        </div>
        <button class=\"delete\"><i class=\"fa fa-close\"></i></button>
    </div>
";
        $_SESSION['cart'] = $cart;
        $total = $qty = 0;
        foreach ($cart as $value) {
            $total += (int) $value['price'] * (int) $value['qty'];
            $qty += (int) $value['qty'];
        }
        echo $total."-".$qty."-".$element;
    } 