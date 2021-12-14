<?php
class OrderItem extends Db
{
    public function addOrderItem($order_id, $product_id, $name, $image, $price, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO order_items(`order_id`, `product_id`, `name`, `image`, `price`, `quantity`) VALUES(?, ?, ?, ?, ?, ?)");
        $sql->bind_param("iissii", $order_id, $product_id, $name, $image, $price, $quantity);
        return $sql->execute();
    }
}
