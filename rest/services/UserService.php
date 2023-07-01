<?php

require_once 'BaseService.php';
require_once __DIR__."/../dao/UserDao.class.php";

class UserService extends BaseService{
    
    public function __construct(){
        parent::__construct(new UserDao);
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

    private function validateEmail($email) {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }
}





?>