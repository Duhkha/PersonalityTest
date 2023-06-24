<?php
require_once "BaseDao.class.php";
class AnswersDao extends BaseDao {

    public function __construct(){
        parent::__construct("answers");
    }

}

?>