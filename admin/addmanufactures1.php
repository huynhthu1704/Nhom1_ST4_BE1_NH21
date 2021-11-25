<?php
require "config.php";
require "models/manufacture.php";
$manufacture = new AM_Manufacture();
///Xử lý add
if (isset($_POST['submit'])) {
    $manu_name = $_POST['manu_name'];


    if ($discount->addManufactures($manu_name) == true) {
        echo "đã thêm dc";
    } else {
        echo "ko duoc";
    }
}
