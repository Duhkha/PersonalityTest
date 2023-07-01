<?php
require_once "BaseDao.class.php";
class AnswerDao extends BaseDao {

    public function __construct(){
        parent::__construct("answers","answerid");
    }

}

?>