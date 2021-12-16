<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

$name = isset($POST['review_name']) ? $POST['review_name'] : "";
$email = isset($POST['review_email']) ? $POST['review_email'] : "";
$content = isset($POST['content']) ? $POST['content'] : "";
$product_id = isset($POST['product_id']) ? $POST['product_id'] : "";
$rating = isset($POST['rating']) ? $POST['rating'] : 0;
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

