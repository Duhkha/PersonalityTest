<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/AnswerDao.class.php';

class AnswerService extends BaseService{
    
    public function __construct(){
        parent::__construct(new AnswerDao);
    }

}

?>