<?php
class Customer extends Db
{
    public function addNewCustomer($first,$last,$phone,$address,$city,$zipcode,$email,$gender,$birthday,$user,$pass){
        if (self::$connection=== false) {
            die("Connection failed: " . self::$connection->connect_error);
        }
        $sql = "INSERT INTO customers (id,first_name,last_name,email,cus_address,city,zip_code,phone_number,gender,birthday,join_day,username,pwd) VALUES
        (NULL,'$first','$last','$email','$address','$city','$zipcode','$phone','$gender','$birthday',CURRENT_TIMESTAMP,'$user','$pass')";
        if (self::$connection->query($sql) === TRUE) {
        } else {
            echo self::$connection->error;
        }
        
        self::$connection->close();
    }
    public function checkUser($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customers` WHERE `username` = ?");
        $sql->bind_param("s",$user);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function updateCustomer($first,$last,$address,$city,$zipcode,$gender,$birthday,$user)
    {
        $sql = self::$connection->prepare("UPDATE `customers`
        SET `first_name`=? ,`last_name`=?,`cus_address`=?,`city`=?,`zip_code`=?,`gender`=?,`birthday`='$birthday'
        WHERE `username` = ? ;");
        $sql->bind_param("sssssss", $first,$last,$address,$city,$zipcode,$gender,$user);
        return $sql->execute();
    }
    public function updatePassWord($pass,$user)
    {
        $sql = self::$connection->prepare("UPDATE `customers`
        SET `pwd`=?
        WHERE `username` = ? ;");
        $sql->bind_param("ss", $pass,$user);
        return $sql->execute();
    }
    public function updateEmailPhone($phone,$email,$user)
    {
        $sql = self::$connection->prepare("UPDATE `customers`
        SET `phone_number`= ?,`email`= ?
        WHERE `username` = ?");
        $sql->bind_param("sss", $phone,$email,$user);
        return $sql->execute();
    }
}