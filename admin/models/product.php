<?php
class AM_Product extends AM_Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products, manufactures, protypes 
        WHERE products.manu_id=manufactures.manu_id 
        AND products.type_id=protypes.type_id
        ORDER BY id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function deleteProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function addProducts($name, $manu_id, $type_id, $price, $quantity, $image, $desc, $feature, $discount_id)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `quantity`, `pro_image`, `description`,`feature`, `discount_id`) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiiissii", $name, $manu_id, $type_id, $price, $quantity, $image, $desc, $feature, $discount_id);
        return $sql->execute(); //return an object
    }
    public function editProducts($id, $name, $manu_id, $type_id, $price, $quantity, $image, $desc, $feature, $discount_id)
    {
        $sql = self::$connection->prepare("UPDATE `products` 
        SET `name` = ?, `manu_id` = ?,`type_id` = ?, `price`=?, `quantity`=?, `pro_image`=?, `description`=?, `feature`=?, `discount_id`=?
        WHERE `id` = ? ;");
        $sql->bind_param("siiiissiii", $name, $manu_id, $type_id, $price, $quantity, $image, $desc, $feature, $discount_id, $id);
        return $sql->execute(); //return an object
    }
    public function getProductId($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id =?");
        $sql->bind_param("i", $id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getQuantilyByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT `quantity` FROM products WHERE `type_id` =?");
        $sql->bind_param("i", $type_id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getQuantilyByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT `quantity` FROM products WHERE `manu_id` =?");
        $sql->bind_param("i", $manu_id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getQuantilyByDiscount($id)
    {
        $sql = self::$connection->prepare("SELECT `quantity` FROM products WHERE `discount_id` =?");
        $sql->bind_param("i", $id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function editProducts1($id, $name, $manu_id, $type_id, $price, $quantity, $desc, $feature, $discount_id)
    {
        $sql = self::$connection->prepare("UPDATE `products` 
        SET `name` = ?, `manu_id` = ?,`type_id` = ?, `price`=?, `quantity`=?, `description`=?, `feature`=?, `discount_id`=?
        WHERE `id` = ? ;");
        $sql->bind_param("siiiissii", $name, $manu_id, $type_id, $price, $quantity, $desc, $feature, $discount_id, $id);
        return $sql->execute(); //return an object
    }
}
