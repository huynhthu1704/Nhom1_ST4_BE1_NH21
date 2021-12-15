<?php
session_start();
require "models/db.php";
require "models/product.php";
$products = new Product();

    if (isset($_GET['id'])) {    
        $id = $_GET['id'];
        $product = $products->getProductById($id);
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
       // $element = 
        $_SESSION['cart'] = $cart;
        $subtotal = $totalPro = 0;
        foreach ($cart as $value) {
            $subtotal += (int) $value['price'] * (int) $value['qty'];
            $totalPro += (int) $value['qty'];
        }
       
        $image = $cart[$id]['image'];
        $id = $cart[$id]['id'];
        $name = $cart[$id]['name'];
        $qty = $cart[$id]['qty'];
        $price = $cart[$id]['price'];
        echo $subtotal."#".$totalPro."#qty".$id."#<div class=\"product-widget cart$id\">
        <div class=\"product-img\">
            <img src=\"img\\$image\" alt=\"\">
        </div>
        <div class=\"product-body\">
            <h3 class=\"product-name\"><a href=\"detail.php?id=$id\">$name</a></h3>
            <h4 class=\"product-price\"><span class=\"qty\" id=\"qty$id\">1 x </span>".number_format($price)."</h4>
        </div>
        <button onclick=\"removeProductFrCart($id)\" class=\"delete\"><i class=\"fa fa-close\"></i></button>
    </div>
";
    } 