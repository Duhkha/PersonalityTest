<?php
require_once "BaseDao.class.php";
class QuestionsDao extends BaseDao {

    public function __construct(){
        parent::__construct("questions");
    }

}

?>