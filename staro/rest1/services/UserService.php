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

    //Ilma - dodala sam update jer prema videu očito da treba
    public function update($user, $id){
        $user['password'] = md5($user['password']);
        if(isset($user['id_column']) && !is_null($user['id_column']) ){
            return parent::update($user, $id, $user['id_column']);
        }
        return parent::update($user, $id);
    }

    public function register($user) {
        if (!$this->validateEmail($user['email'])) {
            throw new Exception("Invalid email format");
        }

        $existingUser = $this->dao->get_by_email($user['email']);
        if ($existingUser) {
            throw new Exception("Email already in use");
        }

        // Store password as plain text
        return $this->dao->add($user);
    }
/*
    public function login($email, $password) {
        $user = $this->dao->get_by_email($email);

        if(!$user) {
            throw new Exception("User with such email does not exist");
        }

        if($user['password'] != $password) {
            throw new Exception("Invalid password");
        }

        return $user;
    }
*/
    private function validateEmail($email) {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }
}





?>