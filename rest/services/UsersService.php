<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/UsersDao.class.php';
class UserService extends BaseService{
    private $user_dao;
    
    public function __construct(){
        parent::__construct(new UsersDao);
    }
    public function add($entity){
        return parent::add($entity);
        //send email
    }

}


?>