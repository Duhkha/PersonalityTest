<?php
require_once "BaseDao.class.php";
class QuestionDao extends BaseDao {

    public function __construct(){
        parent::__construct("questions","questionid");
    }

}

?>