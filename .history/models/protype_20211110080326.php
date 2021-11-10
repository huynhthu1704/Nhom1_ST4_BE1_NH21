<?php
class Protype extends Db
{
    public function gettypeId($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id` = ?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}