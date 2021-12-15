<?php
session_start();
if (isset($_GET['id'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                if ($value['qty'] > 0) {
                    $value['qty']--;
                } else {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
        echo count($_SESSION['cart']);
    } else {
        echo "0";
    }
}
