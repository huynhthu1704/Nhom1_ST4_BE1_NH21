<?php
class Product extends Db
{
    public function getManufacturesName()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}