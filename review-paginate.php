<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $perPage = $_GET['perpage'];
    $product_id = $_GET['id'];
    $getReview = $review->get3Reviews($product_id, $page , $perPage);
    $return = "";
    $rvrating = "";

    foreach ($getReview as $value) {
        $rvname = $value['name'];
        $rvtime = $value['time'];
        $rvcontent = $value['content'] == "" ? "" :  $value['content'];
        $rvrating = "";
        $rvrating .= "<div class=\"review-rating\">";
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $value['rating']) {
                $rvrating .= "<i class=\"fa fa-star\"></i>";
            } else {
                $rvrating .= "<i class=\"fa fa-star-o empty\"></i>";
            }
        }
        $rvrating .= "</div>";
        $return .= "<li>
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

    $totalLinks = ceil(count($review->getAllReviewByProductID($product_id)) / $perPage);
    $link = "";
    for ($j = 1; $j <= $totalLinks; $j++) {
        if ($j == $page) {
            $link .= "<li class=\"active\"><a onclick=\"paginate($product_id,$j,$perPage)\">$j</a></li>";
        } else {
            $link .= "<li><a onclick=\"paginate($product_id,$j,$perPage)\">$j</a></li>";
        }
    }
   
    echo $link.'#'.$return;
}
