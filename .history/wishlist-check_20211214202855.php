<?php
session_start();
echo "hi";
if (isset($_GET['id'])) {
    if (isset($_SESSION['wishlist'])) {
        foreach ($_SESSION['wishlist'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['wishlist'][$key]);
                echo true;
            }
        }
    } else {
        echo false;
    }
}
echo false;
