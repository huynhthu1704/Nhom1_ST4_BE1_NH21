<?php
class Discount extends Db {
    public function getDiscountByID($id) {
        $sql = self::$connection->prepare("SELECT * FROM discount, products WHERE discount.dis_id = products.discount_id and discount.dis_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}