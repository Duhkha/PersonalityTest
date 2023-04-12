<?php
require_once "BaseDao.class.php";
class UsersDao extends BaseDao {

    public function __construct(){
        parent::__construct("users");
    }
/*
    public function get_all(){
        return parent::get_all();
    }
*/


}

?>