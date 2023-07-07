<?php
require_once "BaseDao.class.php";
class HistoryDao extends BaseDao {

    public function __construct(){
        parent::__construct("histories","historyid");
    }

    public function get_by_user_id($user_id){
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE userid = :userid");
        $stmt->execute(['userid' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}

?>