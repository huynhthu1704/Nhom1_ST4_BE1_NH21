<?php
session_start();
if (isset($_GET['id'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
        }
        $subtotal = $totalPro = 0;
        foreach ($cart as $value) {
            $subtotal += (int) $value['price'] * (int) $value['qty'];
            $totalPro += (int) $value['qty'];
        }
        echo $subtotal."#".$totalPro;
    } else {
        echo "0";
    }
}
