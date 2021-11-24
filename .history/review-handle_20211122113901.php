<?php 
require "config.php";
require "models/reviews.php";
$product = new Product();
$protype = new Protype();
    $review_name = isset($POST['review_name'])? $POST['review_name'] :"";
    $review_email = isset($POST['review_email'])? $POST['review_email'] :"";
    $review_name = isset($POST['content'])? $POST['content'] :"";
    $product_id = isset($POST['product_id'])? $POST['product_id'] :"";