<?php
session_start();
if (isset($_GET['id'])) {
    if ($value['id'] == $_GET['id']) {
        unset($_SESSION['wishlist'][$key]);
    }
}