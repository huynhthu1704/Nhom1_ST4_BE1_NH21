<?php
class Customer extends Db
{
    public function addNewCustomer($first,$last,$phone,$address,$email,$gender,$birthday){
        //$sql = "INSERT INTO customer VALUES (NULL,$first,$last,$phone,$address,$email,$gender,$birthday,CURRENT_TIMESTAMP)";
       // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
if (self::$connection->connect_error) {
    die("Connection failed: " . self::$connection->connect_error);
  }
        if (self::$connection->query("INSERT INTO customer VALUES (NULL,$first,$last,$phone,$address,$email,$gender,$birthday,CURRENT_TIMESTAMP)") == TRUE) {
            echo $first;
            echo $last;
            echo "hihi";
        } else {
            echo $first;
            echo $last;
            echo "huhu";
            echo self::$connection->error;
        }
        
        self::$connection->close();
    }
}