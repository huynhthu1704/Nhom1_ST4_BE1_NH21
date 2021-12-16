<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

$name = isset($_GET['name']) ? $_GET['name'] : "";
$email = isset($_GET['email']) ? $_GET['email'] : "";
$content = isset($_GET['rv_content']) ? $_GET['rv_content'] : "";
$product_id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : "";
$rating = isset($_GET['rating']) ? (int) $_GET['rating'] : 0;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
$perPage = isset($_GET['perpage']) ? (int) $_GET['perpage'] : 0;
$rs = $review->insertReview($name, $content, $email, $rating, $product_id);

