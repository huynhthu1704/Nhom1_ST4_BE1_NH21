<?php 
require "config.php";
require "models/db.php";
require "models/protype.php";
$id = $_GET['type_id'];
$protype = new AM_Protype();
if (isset($_GET['type_id'])) {
  $protype->deleteProtype($id);
}
header("location:protype.php");
?>