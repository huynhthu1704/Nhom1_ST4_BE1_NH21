<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new AM_Protype();
///Xử lý add
if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    if ($protype->addProtypes($name) == true) {
        header("location:protype.php");
    } else {
        echo "loi";
    }
}
