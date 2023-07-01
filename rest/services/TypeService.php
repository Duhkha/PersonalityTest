<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/TypeDao.class.php";

class TypeService extends BaseService{
    
    
    public function __construct(){
        parent::__construct(new TypeDao);
    }

}


?>