<?php
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
    $check="";
    foreach ($checkname as $values) {
        $check = $values['username'];
    }
    if ($retypepassword != $pass) {
        header("Location: register.php?error=Password mismatch");
    } else if ($username == $check) {
        header("Location: register.php?error=Account already exists");
    } else {
        $addNewCustomer = $customer->addNewCustomer($first, $last, $phone, $address, $city, $zipcode, $email, $gender, $birtday, $username, $pass);
        header("Location: index.php");
    }
}
?>
