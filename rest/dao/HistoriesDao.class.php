<?php
require_once "BaseDao.class.php";
class HistoriesDao extends BaseDao {

    public function __construct(){
        parent::__construct("histories");
    }

}

?>