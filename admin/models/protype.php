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
    public function editProtype($id,$type_name)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` 
        SET `type_name` = ?
        WHERE `type_id` = ? ;");
        $sql->bind_param("si",$type_name,$id);
        return $sql->execute(); //return an object
    }
    public function addProtypes($name)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `protypes`(`type_name`) 
        VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute(); //return an object
    }
    public function deleteProtype($id)
    {
        $sql = self::$connection->prepare("DELETE FROM protypes WHERE type_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
}