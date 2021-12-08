<?php
session_start();
require "config.php";
require "models/db.php";
require "models/login.php";

$login = new Login();
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
    $getLogin = $login->getLogin($username, $password);
    foreach ($getLogin as $value) {
      $value1 = $value['username'];
    }
    if ($value['username'] == $username && $value['pwd'] == $password) {
      $_SESSION['user_name'] = $value['username'];
      $_SESSION['id'] = $value['id'];
      if (isset($_POST['remember'])) {
        setcookie('username',   $username, time() + (60*30));
        setcookie('password',   $password, time() + (60*30));
      }
      else{
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