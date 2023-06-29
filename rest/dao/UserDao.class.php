<?php

require_once "BaseDao.class.php";

class UserDao extends BaseDao{
    public function __construct(){
            parent::__construct("users","userid"); //or users idk
    }

    public function get_by_email($email){
        $stmt =  $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>