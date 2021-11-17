<?php
class Promotion extends Db
{
    public function getAllPromotions()
    {
        $sql = self::$connection->prepare("SELECT * FROM `promotions`, `promotion_type`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}