<?php
require_once 'BaseService.php';
require_once __DIR__.'/../dao/AnswerDao.class.php';

class AnswerService extends BaseService{
    
    public function __construct(){
        parent::__construct(new AnswerDao);
    }

    public function get_by_question_id($questionid) {
        return $this->dao->get_by_question_id($questionid);
    }

}

?>