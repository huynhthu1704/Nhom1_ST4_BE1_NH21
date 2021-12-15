<?php
class SessionCartDetail extends Db
{
    public function getSSCartDetail($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `session_cart_detail` WHERE `ss_cart_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    public function addSSCartDetail($ss_cart_id, $product_id, $qty)
    {
        $sql = self::$connection->prepare("INSERT INTO session_cart_detail(session_cart_id, product_id, qty) VALUES(?,?,?)");
        $sql->bind_param("iii", $ss_cart_id, $product_id, $qty);
        return $sql->execute();
    }
}
