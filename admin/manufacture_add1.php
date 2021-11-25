<?php
require "config.php";
require "models/db.php";
require "models/manufacture.php";
$manufacture = new AM_Manufacture();
///Xử lý add
if (isset($_POST['submit'])) {
    $manu_name = $_POST['manu_name'];

    if ($manufacture->addManufactures($manu_name) == true) {
        echo "đã thêm dc";
        header('location:manufacture');
    } else {
        header('location:manufacture.php');
        echo "<script>alert(\"Thêm không thành công]\")</script>";
    }
}
