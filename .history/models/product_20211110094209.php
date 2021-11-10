<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // public function getAllProducts($page, $perPage)
    // {
    //     $sql = self::$connection->prepare("SELECT * FROM `products` LIMIT ?,?");
    //     $sql->bind_param("ii", $page, $perPage);
    //     $sql->execute();
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items;
    // }

    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 10");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `id` = ?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
       
    public function getManufacturesName($type_id)
    {
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_name` FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` AND `type_id`=$type_id GROUP BY `products`.manu_id ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    public function getCountProduct($type_id)
    {
        $sql = self::$connection->prepare("SELECT count(manu_id) AS dem FROM `products` WHERE `type_id` = $type_id GROUP BY manu_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` = ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // public function searchAll($keyword)
    // {
    //     $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` = ?");
    //     $keyword = "%$keyword%";
    //     $sql->bind_param("s",$keyword);
    //     $sql->execute();
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items;
    // }
    
    public function searchNameAndID($keyword, $type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` = ? AND `type_id` = $type_id");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getLaptops()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id`=2");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getSmartphones()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id`=1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = ?");
        $sql->bind_param("i",$type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function get6ProductByTypeId($type_id, $page, $perPage)
    {
        $firstLink = ($page-1)*$perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = ? LIMIT ?, ?");
        $sql->bind_param("iii",$type_id, $firstLink, $perPage);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getTypeName($type_id)
    {
        $sql = self::$connection->prepare("SELECT `protypes`.`type_name` FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id` AND `products`.`type_id` = ?");
        $sql->bind_param("i",$type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items[0]['type_name'];
    }

    public function paginate($url, $total, $page, $perPage) {

    }
}