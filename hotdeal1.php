<?php 
require "models/db.php";
require "models/product.php";
//$getfilter = $product->filter();
if(isset($_POST['action'])) {
    $query = "select * from product where id = 1";
    
    if(isset($_POST['brand'])){
        $brand_filter = implode("','", $_POST['brand']);
        $query.= "AND type_id IN ('".$brand_filter."')";
    }
    

}
?>