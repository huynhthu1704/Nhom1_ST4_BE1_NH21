<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/customer.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $customer =  new Customer();
    $first =  $_POST['first'];
    $last = $_POST['last'];
    $phone = $_POST['phone'];
    $address =  $_POST['address'];
    $email =  $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['user'];
    $pass = $_POST['password'];
    $retypepassword = $_POST['retype-password'];
    $birtday = $_POST['birthday'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $checkname = $customer->checkUser($username);
    $check;
    foreach ($checkname as $values) {
        $check = $values['username'];
    }
    if ($retypepassword != $pass) {
        echo "<script> alert('Tài khoản đã tồn tại'); </script>";
        header("Location: register.php");
    } else {
        if ($username == $check) {
            echo "<script> alert('Registered name was used'); </script>";
            header("Location: register.php");
        } else {
            $addNewCustomer = $customer->addNewCustomer($first,$last,$phone,$address,$city,$zipcode,$email,$gender,$birtday,$username,$pass);
        }
    }
}
?>
