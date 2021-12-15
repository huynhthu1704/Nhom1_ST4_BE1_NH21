<?
class SessionWishlistDetail extends Db {
    public function getDetail($ss_wishlist_id) {
        $sql = self::$connection->prepare("SELECT * FROM session_wishlist_detail WHERE ss_wishlist_id = ?");
        $sql->bind_param(("i", $ss_wishlist_id);
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}