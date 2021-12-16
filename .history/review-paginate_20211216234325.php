<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

if (isset($_GET['page'])) {
    $getReview = $review->get3Reviews($_GET['page'], $_GET['perpage']);
    $return = "";
    $rvrating = "";

    foreach ($getReview as $value) {
        $rvname = $value['name'];
        $rvtime = $value['time'];
        $rvcontent = $value['content'] == "" ? "" :  $value['content'];
        $rvrating = "";
        $rvrating .= "<div class=\"review-rating\">";
        for ($i = 1; $i <= 5; $i++) {
            if ($i < $value['rating']) {
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

    echo $return;
}
