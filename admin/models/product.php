<?php
include "db.php";
class Product extends Db
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
        $sql->execute();
    }
    public function deleteDiscount($id)
    {
        $sql = self::$connection->prepare("DELETE FROM discount WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
    public function addProducts($name,$manu_id,$type_id,$price,$quantity,$image,$desc,$feature,$discount_id)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `quantity`, `pro_image`, `description`,`feature`, `discount_id`) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiiissii", $name,$manu_id,$type_id,$price,$quantity,$image,$desc,$feature,$discount_id);
        return $sql->execute(); //return an object
    }
}