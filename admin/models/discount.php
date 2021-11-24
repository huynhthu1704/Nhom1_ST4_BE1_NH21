<?php
class Discount extends Db
{
    public function getAllDiscount()
    {
        $sql = self::$connection->prepare("SELECT * FROM `discount` ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function deleteDiscount($id)
    {
        $sql = self::$connection->prepare("DELETE FROM discount WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
}