<?php
class Protype extends Db
{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProtypeId($type_id){
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id =?");
        $sql->bind_param("i", $type_id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}