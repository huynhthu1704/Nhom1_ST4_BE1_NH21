<?php
class AM_Protype extends AM_Db
{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}