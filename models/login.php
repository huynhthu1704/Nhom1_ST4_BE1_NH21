<?php 
class Login extends Db {

    public function getLogin($username,$password) {
        $sql = self::$connection->prepare("SELECT * FROM accounts WHERE `user_name` = ? AND `password` = ?");
        $sql->bind_param("ss", $username,$password);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

}