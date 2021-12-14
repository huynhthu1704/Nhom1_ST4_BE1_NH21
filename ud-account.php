<?php
session_start();
require "models/db.php";
require "models/customer.php";
if (isset($_POST['save'])) {

    $customer =  new Customer();
    $first = $_POST['First'];
    $last = $_POST['Last'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $zipcode = $_POST['zipcode'];
    $birtday = $_POST['birthday'];
    $gender = $_POST['gender'];
    echo $_SESSION['user_name'];
    if ($customer->updateCustomer($first, $last, $address, $city, $zipcode, $gender, $birtday, $_SESSION['user_name'])) {
        echo "<script>alert('Save Changes successfully')</script>";
        echo "<script>window.location = 'account_information.php'</script>";
    } else {
        echo "<script>alert('Save Changes failed')</script>";
        echo "<script>window.location = 'account_information.php'</script>";
    }
}
