<?php
include "config.php";
include "models/db.php";
include "models/manufacture.php";
$manufacture = new AM_Manufacture();
///Xử lý add
if (isset($_POST['submit'])) {
  $manu_id = (int)$_GET['manu_id'];
  $manu_name = $_POST['manu_name'];

  if ($manufacture->editManufactures($manu_name, $manu_id) == true) {
    echo "đã thêm dc";
    header('location:manufacture.php');
  } else {
    header('location:manufacture.php');
    echo "<script>alert(\"Chỉnh sửa không thành công]\")</script>";
  }
}
