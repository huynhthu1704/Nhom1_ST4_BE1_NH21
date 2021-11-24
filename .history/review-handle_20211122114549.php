<?php
require "config.php";
require "models/reviews.php";
$review = new Review();

$name = isset($POST['review_name']) ? $POST['review_name'] : "";
$email = isset($POST['review_email']) ? $POST['review_email'] : "";
$content = isset($POST['content']) ? $POST['content'] : "";
$product_id = isset($POST['product_id']) ? $POST['product_id'] : "";
$rating = isset($POST['rating']) ? $POST['rating'] : 0;
$review->insertReview($name, $content, $email, $rating, $product_id);
