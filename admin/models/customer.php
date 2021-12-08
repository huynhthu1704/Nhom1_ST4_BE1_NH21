<?php
class AM_Customer extends AM_Db
{
    public function getAllCustomer()
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCountCustomer()
    {
        $sql = self::$connection->prepare("SELECT count(id) as dem FROM `customers`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}