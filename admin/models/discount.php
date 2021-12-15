<?php
class AM_Discount extends AM_Db
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
        $sql = self::$connection->prepare("DELETE FROM discount WHERE dis_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
    public function addDiscount($name,$discount_percent,$active,$start_day,$end_day)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `discount`(`dis_name`, `dis_percent`, `dis_active`, `start_day`, `end_day`) 
        VALUES (?,?,?,?,?)");
        $sql->bind_param("siiss", $name,$discount_percent,$active,$start_day,$end_day);
        return $sql->execute(); //return an object
    }
    public function editDiscount($id, $name,$discount_percent,$active,$start_day,$end_day)
    {
        $sql = self::$connection->prepare("UPDATE discount SET `dis_name` = ?, dis_percent = ?,dis_active = ?,start_day = ?, end_day=? WHERE dis_id= ?");
        $sql->bind_param("siissi", $name,$discount_percent,$active,$start_day,$end_day,$id);
        return $sql->execute(); //return an object
    }
    public function getDiscountByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `discount` WHERE `dis_id` = ? ");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}