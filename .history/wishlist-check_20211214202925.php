<?php
session_start();

if (isset($_GET['id'])) {
    echo "hi";
    if (isset($_SESSION['wishlist'])) {
        foreach ($_SESSION['wishlist'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['wishlist'][$key]);
                echo true;
            }
        }
    } else {
        //echo false;
    }
}
//echo false;
