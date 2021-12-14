<?php
class SessionCart extends Db{
    public function getSessionCart($customer_id) {
        $sql = self::$connection->prepare("SELECT * FROM `session_cart` WHERE `customer_id` = ? ORDER BY `time`");
        $sql->bind_param("i",$customer_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}