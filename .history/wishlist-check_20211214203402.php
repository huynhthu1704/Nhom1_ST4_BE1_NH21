<?php
session_start();

if (isset($_GET['id'])) {
    echo "hi";
    if (isset($_SESSION['wishlist'])) {
        echo "hiii";
        foreach ($_SESSION['wishlist'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                echo "hee";
                unset($_SESSION['wishlist'][$key]);
                echo true;
            }
        }
    } else {
        echo false;
    }
}
echo false;
