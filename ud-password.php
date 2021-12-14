<?php 
session_start();
require "models/db.php";
require "models/customer.php";
if (isset($_POST['submit'])) {
    $customer =  new Customer();
    $new = $_POST['new-password'];
    $retypepassword = $_POST['retype-password'];
    $current = md5($_POST['current-password']);
    $checkpass = $customer->checkUser($_SESSION['user_name']);
    $check=$checkpass[0]['pwd'];
    if ($retypepassword != $new) {
        header("Location: account_information.php?error=Retype Password and New Password mismatch");
    } else if ($current != $check) {
        header("Location: account_information.php?error=Current Password is incorrect");
    } else {
        $update = $customer->updatePassWord(md5($new),$_SESSION['user_name']);
        echo "<script>alert('Change password successfully')</script>";
        echo "<script>window.location = 'account_information.php'</script>";
      
    }
}