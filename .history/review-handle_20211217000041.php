<?php
require "models/db.php";
require "models/reviews.php";
$review = new Review();

$name = isset($_GET['name']) ? $_GET['name'] : "";
$email = isset($_GET['email']) ? $_GET['email'] : "";
$content = isset($_GET['rv_content']) ? $_GET['rv_content'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";
$rating = isset($_GET['rating']) ? $_GET['rating'] : 0;
$page = isset($_GET['page']) ? $_GET['page'] : 0;
$perPage = isset($_GET['perpage']) ? $_GET['perpage'] : 0;
$rs = $review->insertReview($name, $content, $email, $rating, $product_id);
if ($rs != -1) {
    $newRV = $review->getAllReviewByID($rs);
    $rvname = $newRV[0]['name'];
    $rvtime = $newRV[0]['time'];
    $rvcontent = $newRV[0]['content'] == "" ? "" :  $newRV[0]['content'];
    $rvrating = "<div class=\"review-rating\">";
    for ($i = 1; $i <= $newRV[0]['rating']; $i++) {
        $rvrating .= "<i class=\"fa fa-star\"></i>";
    }
    for ($i = 1; $i <= (5 - $newRV[0]['rating']); $i++) {
        $rvrating .= "<i class=\"fa fa-star-o empty\"></i>";
    }
    $rvrating .= "</div>";

    $totalLinks = ceil(count($review->get3Reviews($product_id, $page, $perPage)) / $perPage);
    $link = "";
    for ($j = 1; $j <= $totalLinks; $j++) {
        if ($j == $page) {
            $link = "<li class=\"active\"><a onclick=\"paginate(<?php echo $product_id.','.$j.','.$perPage?>)\" href=\"\"><?php echo $j?></a></li>";
        } else {
            $link = "<li><a onclick=\"paginate($product_id.','.$j.','.$perPage)\" href=\"\"><?php echo $j?></a></li>";
        }
    }
    echo "";
}
