<?php 
class Login extends Db {

    public function getLogin($username,$password) {
        $sql = self::$connection->prepare("SELECT * FROM customers WHERE `username` = ? AND `pwd` = ?");
        $sql->bind_param("ss", $username,$password);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}