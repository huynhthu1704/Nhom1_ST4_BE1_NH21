<?php
session_start();
if (isset($_GET['id'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id'] &&  $_GET['action'] == "remove") {
                unset($_SESSION['cart'][$key]);
            } else {
                echo $value['qty']."sl<br>";
                $value['qty']--;
            }
        }
        $subtotal = $totalPro = 0;
        foreach ($_SESSION['cart'] as $value) {
            $subtotal += (int) $value['price'] * (int) $value['qty'];
            $totalPro += (int) $value['qty'];
        }
        echo $subtotal."#".$totalPro;
    } else {
        echo "0";
    }
}
