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
    $star1 = 0;
    $star2 = 0;
    $star3 = 0;
    $star4 = 0;
    $star5 = 0;
    foreach ($getRV as $value) {
        $totalRating += $value['rating'];
        switch ((int)$value['rating']) {
            case 1:
                $star1++;
                break;
            case 2:
                $star2++;
                break;
            case 3:
                $star3++;
                break;
            case 4:
                $star4++;
                break;
            case 5:
                $star5++;
                break;
        }
    }
    $averageRating = round($totalRating/$count, 1);
    $rvrating = "<div class=\"review-rating\">";
    for ($i = 1; $i <= $averageRating; $i++) {
        $rvrating .= "<i class=\"fa fa-star\"></i>";
    }
    for ($i = 1; $i <= (5 - (int)$averageRating); $i++) {
        $rvrating .= "<i class=\"fa fa-star-o empty\"></i>";
    }
    $rvrating .= "</div>";
    $rating_progress = "";


    $rating_progress .= "<li>
        <div class=\"rating-stars\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
        </div>
        <div class=\"rating-progress\">
            <div style=\"width:".round(($star5/$count) * 100)."%;\"></div>
        </div>
        <span class=\"sum\">$star5</span>
    </li>
    <li>
        <div class=\"rating-stars\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star-o\"></i>
        </div>
        <div class=\"rating-progress\">
            <div style=\"width:".round(($star4/$count) * 100)."%;\"></div>
        </div>
        <span class=\"sum\">$star4</span>
    </li>
    <li>
        <div class=\"rating-stars\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
        </div>
        <div class=\"rating-progress\">
        <div style=\"width:".round(($star3/$count) * 100)."%;\"></div>
        </div>
        <span class=\"sum\">$star3</span>
    </li>
    <li>
        <div class=\"rating-stars\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
        </div>
        <div class=\"rating-progress\">
        <div style=\"width:".round(($star2/$count) * 100)."%;\"></div>
        </div>
        <span class=\"sum\">$star2</span>
    </li>
    <li>
        <div class=\"rating-stars\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
            <i class=\"fa fa-star-o\"></i>
        </div>
        <div class=\"rating-progress\">
        <div style=\"width:".round(($star1/$count) * 100)."%;\"></div>
        </div>
        <span class=\"sum\">$star1</span>
    </li>";
    echo $totalRating."#".$averageRating."#".$rvrating."#".$rating_progress;
}