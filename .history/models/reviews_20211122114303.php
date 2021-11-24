<?php 
class Review extends Db {
    public function insertReview($name, $rv_content, $email, $rating, $product_id) {
        $sql = self::$connection->prepare("insert into reviews(review_id,name, email, rv_content, rating, product_id) values(NULL,?, ?, ?, ?, ?)");
        $sql->bind_param("ssii",$name, $rv_content, $rating, $product_id);
        $sql->execute();
    }
}