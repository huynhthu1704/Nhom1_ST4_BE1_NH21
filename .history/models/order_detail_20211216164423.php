<?php
class OrderDetail extends Db
{
    public function addOrder($firstname, $lastname, $email, $order_address, $city, $zip_code, $quantity, $subtotal, $shipping_fee, $total, $phone_number, $customer_id, $note)
    {
        $sql = "INSERT INTO order_details(first_name, last_name, email, order_address, city, zip_code, quantity, sub_total, shipping_fee, total, phone_number, customer_id, note)
        VALUES ('$firstname', '$lastname', '$email', '$order_address', '$city', '$zip_code', $quantity, $subtotal, $shipping_fee, $total, '$phone_number', $customer_id, '$note')";
        if (self::$connection->query($sql)) {
            return self::$connection->insert_id;
        } else {
            return -1;
        }
    }
    public function getOrderDetailById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `order_details` WHERE customer_id = $id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
