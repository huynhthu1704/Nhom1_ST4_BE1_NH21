<?php
class SessionWishlist extends Db {
    public function getWL($customer_id) {
        $sql = self::$connection->prepare("SELECT * FROM session_wishlist WHERE customer_id = ?");
        $sql->bind_param("i", $customer_id);
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function addSSWishlist($customer_id)
    {
        $sql = "INSERT INTO `session_wishlist`(customer_id) VALUES($customer_id)";
        if (self::$connection->query($sql)) {
            return self::$connection->insert_id;
        } else {
            return -1;
        }
    }
}