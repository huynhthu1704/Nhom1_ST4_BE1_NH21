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
            echo "Thêm Thành công";
        } else {
            echo self::$connection->error;
        }
        
        self::$connection->close();
    }
    public function checkUser($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `accounts` WHERE `username` = ?");
        $sql->bind_param("s",$user);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}