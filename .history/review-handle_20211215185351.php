<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

$name = isset($_GET['review_name']) ? $_GET['review_name'] : "";
$email = isset($_GET['review_email']) ? $_GET['review_email'] : "";
$content = isset($_GET['content']) ? $_GET['content'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";
$rating = isset($_GET['rating']) ? $_GET['rating'] : 0;
$review->insertReview($name, $content, $email, $rating, $product_id);
echo "	<li>
<div class=\"review-heading\">
    <h5 class=\"name\">John</h5>
    <p class=\"date\">27 DEC 2018, 8:0 PM</p>
    <div class=\"review-rating\">
        <i class=\"fa fa-star\"></i>
        <i class=\"fa fa-star\"></i>
        <i class=\"fa fa-star\"></i>
        <i class=\"fa fa-star\"></i>
        <i class=\"fa fa-star-o empty\"></i>
    </div>
</div>
<div class=\"review-body\">
    <p>Lorem </p>
</div>
</li>";

