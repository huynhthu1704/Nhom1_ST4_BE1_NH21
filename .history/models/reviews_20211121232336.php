<?php 
class Review extends Db {
    public function insertReview($name, $phone_number, $rv_content, $rating, $product_id) {
        $sql = self::$connection->prepare("insert into reviews(name, phone_number, rv_content, rating, product_id) values(?, ?, ?, ?, ?)");
        $sql->bind_param("sssss",)
    }
}