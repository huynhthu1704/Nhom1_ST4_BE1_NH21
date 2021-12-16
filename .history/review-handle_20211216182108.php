<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

$name = isset($_GET['name']) ? $_GET['name'] : "";
$email = isset($_GET['email']) ? $_GET['email'] : "";
$content = isset($_GET['rv_content']) ? $_GET['rv_content'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";
$rating = isset($_GET['rating']) ? $_GET['rating'] : 0;
$rs = $review->insertReview($name, $content, $email, $rating, $product_id);
if ($rs != -1) {
    $newRV = $review->getAllReviewByID($rs);
    $rvname = $newRV[0]['name'];
    $rvtime = $newRV[0]['time'];
    $rvcontent = $newRV[0]['content'] == "" ? "" :  $newRV[0]['content'];
    $rvrating = "<div class=\"review-rating\">";
    for ($i = 1; $i <= $newRV[0]['rating']; $i++) {
        $rvrating .="<i class=\"fa fa-star\"></i>";
    }
    for ($i = 1; $i <= (5 - $newRV[0]['rating']); $i++) {
        $rvrating .= "<i class=\"fa fa-star-o empty\"></i>";
    }
    $rvrating .= "</div>";
    echo "<li>
<div class=\"review-heading\">
    <h5 class=\"name\">$rvname</h5>
    <p class=\"date\">" . $rvtime . "</p>
    $rvrating
</div>
<div class=\"review-body\">
    <p>" . $rvcontent . "</p>
</div>
</li>";
}

// echo "<li>
// <div class=\"review-heading\">
//     <h5 class=\"name\">$rvname</h5>
//     <p class=\"date\">".$rvtime."</p>
//     <div class=\"review-rating\">
//         <i class=\"fa fa-star\"></i>
//         <i class=\"fa fa-star\"></i>
//         <i class=\"fa fa-star\"></i>
//         <i class=\"fa fa-star\"></i>
//         <i class=\"fa fa-star-o empty\"></i>
//     </div>
// </div>
// <div class=\"review-body\">
//     <p>".$rvcontent."</p>
// </div>
// </li>";
// }
