<?php
class AM_OrderItem extends AM_Db
{
    public function getOrderById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `order_items` WHERE order_id= '$id'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCountOrderItem($order_id)
    {
        $sql = self::$connection->prepare("SELECT  `name`,count(order_items.order_id) AS dem FROM `order_details`,`order_items` WHERE order_details.order_id = order_items.order_id AND order_items.order_id = $order_id GROUP BY order_items.order_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
