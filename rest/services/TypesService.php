<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/TypesDao.class.php';

class TypesService extends BaseService{
    #private $user_dao;
    
    public function __construct(){
        parent::__construct(new TypesDao);
    }
    public function add($entity){
        return parent::add($entity);
        //send email
    }

}


?>