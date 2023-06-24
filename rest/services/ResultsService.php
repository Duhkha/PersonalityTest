<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/ResultsDao.class.php';

class ResultsService extends BaseService{
    
    public function __construct(){
        parent::__construct(new ResultsDao);
    }

}

?>