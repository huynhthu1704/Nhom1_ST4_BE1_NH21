<?php 
session_start();
require "models/db.php";
require "models/customer.php";
if (isset($_POST['Update'])) {
    $customer =  new Customer();
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    echo $email;
    echo $phone;
    echo $_SESSION['user_name'];
    if($customer->updateEmailPhone($email,$phone,$_SESSION['user_name'])){
        echo "<script>alert('Update successfully')</script>";
        // echo "<script>window.location = 'account_information.php'</script>";
    }else{
        echo "<script>alert('Update failed')</script>";
        // echo "<script>window.location = 'account_information.php'</script>";
    }
}