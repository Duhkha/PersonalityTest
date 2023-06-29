<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/HistoryDao.class.php';

class HistoryService extends BaseService{
    
    public function __construct(){
        parent::__construct(new HistoryDao);
    }

}

?>