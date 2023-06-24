<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/QuestionsDao.class.php';

class QuestionsService extends BaseService{
    
    public function __construct(){
        parent::__construct(new QuestionsDao);
    }

}

?>