<?php
//''
require_once __DIR__."/../Config.class.php";

class BaseDao{
    private $conn;
    private $table_name; //entity
    //connect to database
    public function __construct($table_name){
    try {
    $this -> table_name;
    $servername = Config::DB_HOST();
    $username = Config::DB_USERNAME();
    $password = Config::DB_PASSWORD();
    $dbname = Config::DB_SCHEMA();

    $this-> conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $this-> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

//method used to get all entities from database
public function get_all(){
    $stmt =  $this->conn->prepare("SELECT * FROM ". $this->table_name);
    $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
 }

 //get entity by id from database
 public function get_by_id($id){
    $stmt =  $this->conn->prepare("SELECT * FROM ".$this->table_name ." WHERE id=:id");
    $stmt->execute(['id'=>$id]);
     return $stmt->fetch();
   
 }
//delete entity from database
 public function delete($id){
    $stmt =  $this->conn->prepare("DELETE FROM ".$this->table_name." WHERE id=:id");
    $stmt->bindParam(':id',$id); //prevent sql injection
    $stmt->execute();
}

//add entity to database
public function add($entity){
$query="INSERT INTO ".$table_name." (";
foreach($entity as $column=>$value){
    $query.=$column.', ';
}
$query=substr($query,0,-2);

$query.=") VALUES (";
foreach($entity as $column=>$value){
    $query.=":".$column.', ';
}
$query=substr($query,0,-2);
$query.=")";

    $stmt =  $this->conn->prepare("INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)");
    $stmt->execute($entity);
    $entity['id'] = $this->conn->lastInsertId();
    return $entity;
}
//update entity to database
public function update($entity,$id,$id_column="id"){
    $user['id']=$id;
    $query="UPDATE ".$this->table_name." SET ";
    foreach($entity as $column=>$value){
        $query.=$column. "=:".$column.", ";
    }
$query=substr($query,0,-2);
$query.=" WHERE ${id_column}=:id";

     $stmt =  $this->conn->prepare($query);
     $entity['id']=$id;
     $stmt->execute($entity);
    return $entity;
 
 }



}

?>