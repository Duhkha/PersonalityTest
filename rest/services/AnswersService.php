<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/AnswersDao.class.php';

class AnswersService extends BaseService{
    
    public function __construct(){
        parent::__construct(new AnswersDao);
    }

}

?>