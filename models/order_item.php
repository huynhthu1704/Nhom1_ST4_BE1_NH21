<?php
class OrderItem extends Db
{
    public function addOrderItem($order_id, $product_id, $name, $image, $price, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO order_items(`order_id`, `product_id`, `name`, `image`, `price`, `qty`) VALUES(?, ?, ?, ?, ?, ?)");
        $sql->bind_param("iissii", $order_id, $product_id, $name, $image, $price, $quantity);
        return $sql->execute();
    }
    public function getOrderById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `order_items` WHERE order_id= '$id'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCountOrderItem($id)
    {
        $sql = self::$connection->prepare("SELECT  `name`,count(order_items.order_id) AS dem FROM `order_details`,`order_items` WHERE order_details.order_id = order_items.order_id AND customer_id = $id GROUP BY order_items.order_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
