<?php 
require "config.php";
require "models/db.php";
require "models/manufacture.php";
$id = $_GET['manu_id'];
$manufacture = new AM_Manufacture();
if (isset($_GET['manu_id'])) {
  $manufacture->deleteManufactures($id);
}
header('location:manufacture.php');
?>