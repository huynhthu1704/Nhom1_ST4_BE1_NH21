<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getRV = $review->getAllReviewByProductID($id);
    $averageRating = 0;
    $totalRating = 0;
    $count = count($getRV);
    echo $count;
    foreach ($getRV as $value) {
        $totalRating += $value['rating'];
    }
    $averageRating = round($totalRating/$count, 1);
    $rvrating= "";
    for ($i = 1; $i <= $averageRating; $i++) {
        $rvrating .= "<i class=\"fa fa-star\"></i>";
    }
    for ($i = 1; $i <= (5 - (int)$averageRating); $i++) {
        $rvrating .= "<i class=\"fa fa-star-o empty\"></i>";
    }
    $rvrating .= "</div>";
    echo $totalRating."#".$rvrating;
}