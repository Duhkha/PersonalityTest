<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/QuestionDao.class.php';

class QuestionService extends BaseService{
    
    public function __construct(){
        parent::__construct(new QuestionDao);
    }

}

?>