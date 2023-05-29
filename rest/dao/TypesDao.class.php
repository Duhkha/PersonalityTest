<?php
/**
 * Ilma: dodala sam ovaj jedan entity
 */
require_once "BaseDao.class.php";
class TypesDao extends BaseDao {

    public function __construct(){
        parent::__construct("types");
    }
/*
    public function get_all(){
        return parent::get_all();
    }
*/


}

?>