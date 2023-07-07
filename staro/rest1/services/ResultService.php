<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/ResultDao.class.php';

class ResultService extends BaseService{
    
    public function __construct(){
        parent::__construct(new ResultDao);
    }

    public function add_results($userid, $categoryApoints, $categoryBpoints, $categoryCpoints, $categoryDpoints){
        return $this->dao->add_results($userid, $categoryApoints, $categoryBpoints, $categoryCpoints, $categoryDpoints);
    }
    

}

?>