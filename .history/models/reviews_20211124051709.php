<?php 
class Review extends Db {
    public function insertReview($name, $rv_content, $email, $rating, $product_id) {
        $sql = self::$connection->prepare("insert into reviews(review_id,name, email, content,CURRENT_TIMESTAMP rating, product_id, time) values(NULL,?, ?, ?, ?, ?, CURRENT_TIMESTAMP())");
        $sql->bind_param("sssii",$name, $rv_content, $email, $rating, $product_id);
        $sql->execute();
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