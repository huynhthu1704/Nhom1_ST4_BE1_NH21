<?php
session_start();
require "models/db.php";
require "models/product.php";
require "models/login.php";
require "models/session_cart.php";
require "models/session_cart_detail.php";

$login = new Login();
$session_cart = new SessionCart();

if (isset($_POST['username']) && isset($_POST['password'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (empty($username)) {
    header("location:login.php?error=Username is required");
    exit();
  } else if (empty($password)) {
    header("location:login.php?error=Password is required");
  } else {
    $getLogin = $login->getLoginCustomer($username, $password);
    if ($getLogin[0]['username'] == $username && $getLogin[0]['pwd'] == md5($password)) {
      $ssCart = $session_cart->getSessionCart($getLogin[0]['id']);
      if (count($ssCart) > 0) {
        $ssDetail = new SessionCartDetail();
        $ssCartItem = $ssCart->getSSCartDetail($ssCart[0]['session_id']);
        foreach ($ssCartItem as $value) {
          $product = new Product();
          $productInfo = $product->getProductById($value['product_id']);
            $_SESSION['wishlist'][$value['product_id']] = array (
              "id" => $value['product_id'],
              "name" => $productInfo[0]['name'],
              "image" => $productInfo[0]['pro_image'],
              "price" => $productInfo[0]['price'],
              "qty" => $value['price']
          );
        }
      }
      $_SESSION['user_name'] = $getLogin[0]['username'];
      $_SESSION['name'] = $getLogin[0]['first_name'];
      $_SESSION['id'] = $getLogin[0]['id'];
      if (isset($_POST['remember'])) {
        setcookie('username',   $username, time() + (60 * 30));
        setcookie('password',   $password, time() + (60 * 30));
      } else {
        setcookie('username',   '', time() - (10));
        setcookie('password',   '', time() - (10));
      }
      header('location:index.php');
    } else {
      header("location:login.php?error=Incorrect username or password");
    }
  }
} else {
  header("location:login.php");
}
