<?php 
class Review extends Db {
    public function insertReview($name, $rv_content, $email, $rating, $product_id) {
        $sql = self::$connection->prepare("insert into reviews(review_id,name, email, rv_content, rating, product_id) values(NULL,?, ?, ?, ?, ?)");
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
}