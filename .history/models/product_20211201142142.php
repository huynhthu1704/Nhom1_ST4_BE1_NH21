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

    public function getAllProductsWithProtype($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE products.type_id = protypes.type_id and products.id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes`, discount WHERE `products`.type_id = `protypes`.type_id AND `products`.type_id = discount.dis_id AND (CURRENT_DATE() - products.created_at) < 30 ORDER BY products.`created_at`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `id` = ? LIMIT 1");
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
    public function GetAllManufacturesName(){
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_name` FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` GROUP BY `products`.manu_id ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getManuNameByHotDeal()
    {
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_name` FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` AND `discount_id` != 0 GROUP BY `products`.manu_id ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getCountProductHotDeal()
    {
        $sql = self::$connection->prepare("SELECT count(manu_id) AS dem FROM `products` WHERE `discount_id` != 0 GROUP BY manu_id");
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
    public function getAllCountProduct()
    {
        $sql = self::$connection->prepare("SELECT count(manu_id) AS dem FROM `products` GROUP BY manu_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, protypes WHERE products.type_id = protypes.type_id and `name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    public function searchNameByTypeIDAndName($keyword, $type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, protypes WHERE products.type_id = protypes.type_id and `name` LIKE ? AND `type_id` = ?");
        $keyword = "%$keyword%";
        $sql->bind_param("si",$keyword, $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function searchNameByTypeID($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, protypes WHERE products.type_id = protypes.type_id and products.`type_id` = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getLaptops()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes`, discount WHERE products.type_id = protypes.type_id and products.`type_id`=2 and products.discount_id = discount.dis_id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getSmartphones()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE products.type_id = protypes.type_id and products.type_id =1");
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

    public function getSaleProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `discount_id` != 0");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function get6ProductSale($page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `discount_id` != 0 LIMIT ?, ?");
        $sql->bind_param("ii",$firstLink, $perPage);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get6ProductByTypeId($type_id, $page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
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
        $totalLinks = ceil($total/$perPage);
        $link ="";
        for($j=1; $j <= $totalLinks ; $j++)
        {
            $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
        }
        return $link;
    }
}