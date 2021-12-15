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

   
}
