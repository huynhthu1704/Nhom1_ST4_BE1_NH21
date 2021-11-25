<?php 
require "config.php";
require "models/db.php";
require "models/manufacture.php";

$manufacture = new AM_Manufacture();
if (isset($_GET['id'])) {
  $manufacture->deleteManufactures($_GET['id']);
}
header('location:manufacture.php');
?>