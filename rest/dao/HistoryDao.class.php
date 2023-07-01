<?php
require_once "BaseDao.class.php";
class HistoryDao extends BaseDao {

    public function __construct(){
        parent::__construct("histories","historyid");
    }

}

?>