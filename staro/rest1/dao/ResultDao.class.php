<?php
require_once "BaseDao.class.php";
class ResultDao extends BaseDao {

    public function __construct(){
        parent::__construct("results","resultsid");
    }

    public function add_results($userid, $categoryApoints, $categoryBpoints, $categoryCpoints, $categoryDpoints){
        $stmt = $this->conn->prepare("INSERT INTO results (userid, categoryApoints, categoryBpoints, categoryCpoints, categoryDpoints) VALUES (:userid, :categoryApoints, :categoryBpoints, :categoryCpoints, :categoryDpoints)");
        $stmt->execute(['userid' => $userid, 'categoryApoints' => $categoryApoints, 'categoryBpoints' => $categoryBpoints, 'categoryCpoints' => $categoryCpoints, 'categoryDpoints' => $categoryDpoints]);
        return $this->conn->lastInsertId();
    }
    

}

?>