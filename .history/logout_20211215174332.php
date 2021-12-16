<?php
require "models/db.php";
require "models/session_cart.php";
require "models/session_cart_detail.php";
require "models/session_wishlist.php";
require "models/session_wishlist_detail.php";
$ssCart = new SessionCart();
$ssCartDetail = new SessionCartDetail();
$ssWishlist = new SessionWishlist();
$ssWLDetail = new SessionWishlistDetail();
session_start();
if (isset($_SESSION['cart'])) {
    if (count($_SESSION['cart']) > 0) {
        $idSS = $ssCart->addSSCart($_SESSION['id']);
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($ssCartDetail->addSSCartDetail($idSS, $value['id'], $value['qty'])) {
            }
        }
    };
}
if (isset($_SESSION['wishlist'])) {
    if (count($_SESSION['wishlist']) > 0) {
        $idSS = $ssWishlist->addSSWishlist($_SESSION['id']);
        foreach ($_SESSION['wishlist'] as $key => $value) {
            if ($ssWLDetail->addDetail($idSS, $value['id'])) {
                echo "hihi";
            }
        }
    };
}
session_destroy();
header("location:login.php");
