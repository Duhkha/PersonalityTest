<?php
require_once "BaseDao.class.php";
class ResultDao extends BaseDao {

    public function __construct(){
        parent::__construct("results","resultsid");
    }    

}

?>