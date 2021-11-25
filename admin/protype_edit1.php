<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new Protype();
///Xử lý add
if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $id = $_GET['id'];
    if ($protype->editProtype($id,$name) == true) {
        header("location:protype.php");
    } else {
        header("location:protype.php?id=$id");
    }
}
