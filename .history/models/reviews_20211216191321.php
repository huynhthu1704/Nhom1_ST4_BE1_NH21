<?php 
class Review extends Db {

    public function insertReview($name, $rv_content, $email, $rating, $product_id)
    {
        $sql = "INSERT INTO `reviews`(`name`, `content`,`email`, `rating`, `product_id`) VALUES('$name', '$rv_content', '$email', $rating, $product_id)";
        if (self::$connection->query($sql)) {
            return self::$connection->insert_id;
        } else {
            return -1;
        }
    }

    public function getAllReviewByID($id) {
        $sql = self::$connection->prepare("SELECT * FROM reviews WHERE product_id =?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllReviews() {
        $sql = self::$connection->prepare("SELECT * FROM reviews");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getNewReview() {
        $sql = self::$connection->prepare("SELECT * FROM reviews ORDER BY time desc");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}