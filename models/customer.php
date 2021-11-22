<?php
class Customer extends Db
{
    public function addNewCustomer($first,$last,$phone,$address,$email,$gender,$birthday){
       // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
        if (self::$connection=== false) {
            die("Connection failed: " . self::$connection->connect_error);
        }
        $sql = "INSERT INTO customer (id,first_name,last_name,phone_number,cus_address,email,gender,birthday,join_day) VALUES
        (NULL,'$first','$last','$phone','$address','$email','$gender','$birthday',CURRENT_TIMESTAMP)";
        if (self::$connection->query($sql) === TRUE) {
            echo "Thêm Thành công";
        } else {
            echo self::$connection->error;
        }
        
        self::$connection->close();
    }
}