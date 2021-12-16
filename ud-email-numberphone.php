<?php 
session_start();
require "models/db.php";
require "models/customer.php";
if (isset($_POST['Update'])) {
    $customer =  new Customer();
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    if($customer->updateEmailPhone($phone,$email,$_SESSION['user_name'])){
        echo "<script>alert('Update successfully')</script>";
        echo "<script>window.location = 'account_information.php'</script>";
    }else{
        echo "<script>alert('Update failed')</script>";
        echo "<script>window.location = 'account_information.php'</script>";
    }
}