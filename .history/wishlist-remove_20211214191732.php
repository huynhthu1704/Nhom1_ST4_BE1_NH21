<?php
session_start();
if (isset($_GET['pid'])) {
    foreach ($_SESSION['wishlist'] as $key=>$value) {
        if ($value['id'] == $_GET['pid']) {
            unset($_SESSION['wishlist'][$key]);
        }
    }
    return count($_SESSION['wishlist']);
}