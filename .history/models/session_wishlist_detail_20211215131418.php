<?php
class SessionWishlistDetail extends Db {
    public function getDetail($ss_wishlist_id) {
        $sql = self::$connection->prepare("SELECT * FROM session_wishlist_detail WHERE ss_wishlist_id = ?");
        $sql->bind_param("i", $ss_wishlist_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function addDetail($ss_wishlist_id, $product_id) {
        $sql = self::$connection->prepare("INSERT INTO session_wishlist_detail(ss_wishlist_id, product_id) VALUES(?, ?)");
        $sql->bind_param("ii", $ss_wishlist_id, $product_id);
       return $sql->execute();
    }
}