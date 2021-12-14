<?php
session_start();
if (isset($_GET['id'])) {
    foreach ($_SESSION['wishlist'] as $key=>$value) {
        if ($value['id'] == $_GET['id']) {
            unset($_SESSION['wishlist'][$key]);
        }
    }
    return count($_SESSION['wishlist']);
}