<?php
class OrderDetail extends Db
{
    public function addOrder($firstname, $lastname, $email, $order_address, $city, $zip_code, $quantity, $subtotal, $shipping_fee, $total, $phone_number, $customer_id, $note)
    {
        $sql = self::$connection->prepare("INSERT INTO order_details(first_name, last_name, email, order_address, city, zip_code, quantity, sub_total, shipping_fee, total, phone_number, customer_id, note)
        VALUES ($firstname, $lastname, $email, $order_address, $city, $zip_code, $quantity, $subtotal, $shipping_fee, $total, $phone_number, $customer_id, $note)");
        self::$connection->query($sql);
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}