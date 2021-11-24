<?php
class Manufacture extends Db
{
    public function getAllManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function deleteManufactures($id)
    {
        $sql = self::$connection->prepare("DELETE FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
}