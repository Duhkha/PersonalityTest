<?php

require_once 'BaseService.php';
require_once __DIR__."/../dao/UserDao.class.php";

class UserService extends BaseService{
    
    public function __construct(){
        parent::__construct(new UserDao);
    }
    
    public function get_user_by_email($email) {
        return $this->dao->get_user_by_email($email);
    }

    public function add($entity){
        $entity['password'] = md5($entity['password']);
        return parent::add($entity);
    }

    private function validateEmail($email) {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }
}





?>