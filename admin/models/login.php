<?php 
class Login extends AM_Db {

    public function getLogin($username,$password) {
        $sql = self::$connection->prepare("SELECT * FROM `admin` WHERE `username` = ? AND `pwd` = ?");
        $password = md5($password);
        $sql->bind_param("ss", $username,$password);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}