<?
class SessionWishlist extends Db {
    public function checkCustomer($customer_id) {
        $sql = self::$connection->prepare("SELECT * FROM session_wishlist WHERE customer_id = ?");
        $sql->bind_param("i", $customer_id);
        $item = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}