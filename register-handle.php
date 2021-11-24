<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php"; 
require "models/customer.php"; ?>
<?php
    if (isset($_POST['submit'])) {
        $first = isset($_POST['first'])? $_POST['first'] : "";
        $last = isset($_POST['last']) ? $_POST['last']: "";
        $phone =isset( $_POST['phone']) ?  $_POST['phone']: "";
        $address = isset( $_POST['address']) ?  $_POST['address']: "";
        $email = isset( $_POST['email']) ?  $_POST['email']: "";
        $gender = isset( $_POST['gender']) ?  $_POST['gender']: "";
        $username=isset($_POST['user'])? $_POST['user']:"";
        $pass=isset($_POST['password']) ? $_POST['password']:"";
        $birtday= isset($_POST['birthday']) ? $_POST['birthday']:"";
        $retypepassword=isset($_POST['retype-password'])? $_POST['retype-password']: "";
        if ($retypepassword!=$pass) {
           header("Location: register.php");
        }else{
            $customer =  new Customer();
            
            $addNewCustomer = $customer->addNewCustomer($first,$last,$phone,$address,$email,$gender,$birtday);
        }
      }
?>
