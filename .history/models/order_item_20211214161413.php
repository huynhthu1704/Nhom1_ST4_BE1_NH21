<?php
class OrderItem extends Db{
    public function addOrderItem($bill_id, $product_id, $quantity) {
        $sql = "INSERT INTO order_items($bill_id, $product_id, $quantity) VALUES()";
    }
}