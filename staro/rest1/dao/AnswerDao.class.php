<?php
require_once "BaseDao.class.php";
class AnswerDao extends BaseDao {

    public function __construct(){
        parent::__construct("answers","answerid");
    }

    public function get_by_question_id($questionid){
        $stmt = $this->conn->prepare("SELECT * FROM answers WHERE questionid = :questionid");
        $stmt->execute(['questionid' => $questionid]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>