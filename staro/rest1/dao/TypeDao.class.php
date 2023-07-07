<?php
require_once "BaseDao.class.php";
class TypeDao extends BaseDao {

    public function __construct(){
        parent::__construct("types","typeid");
    }

}

?>