<?php
class AM_OrderDetails extends AM_Db
{
    public function getCountOrderDetails()
    {
        $sql = self::$connection->prepare("SELECT count(order_id) as dem FROM `order_details`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllTotal()
    {
        $sql = self::$connection->prepare("SELECT SUM(total) as revenue FROM `order_details`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}