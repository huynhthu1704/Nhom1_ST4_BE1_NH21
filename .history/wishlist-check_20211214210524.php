<?php
session_start();
if (isset($_GET['id'])) {
    if (isset($_SESSION['wishlist'])) {
        foreach ($_SESSION['wishlist'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                echo "hee";
                unset($_SESSION['wishlist'][$key]);
                echo true;
                break;
            }
        }
    } else {
        echo false;
    }
} else {
    echo false;
}

