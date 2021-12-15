<?php
session_start();
if (isset($_GET['id'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $value) {
            if ($value['id'] == $_GET['id']) {
                $value['id']['qty']++;
            }
        }
    };
}
