<?php
class Review extends Db
{

    public function insertReview($name, $rv_content, $email, $rating, $product_id)
    {
        $sql = "INSERT INTO `reviews`(`name`, `content`,`email`, `rating`, `product_id`) VALUES('$name', '$rv_content', '$email', $rating, $product_id)";
        if (self::$connection->query($sql)) {
            return self::$connection->insert_id;
        } else {
            return -1;
        }
    }

    public function getAllReviewByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM reviews WHERE review_id =?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllReviewByProductID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM reviews WHERE product_id =?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function get4Reviews($page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM reviews LIMIT $firstLink, $perPage");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function paginate($url, $total,$perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<li><a href='$url&page=$j'> $j </a></li>";
        }
        return $link;
    }

    public function getNewReview()
    {
        $sql = self::$connection->prepare("SELECT * FROM reviews ORDER BY time desc");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
