<?php
   
require_once __DIR__."/../Config.class.php";

class BaseDao{
    protected $conn;
    protected $table_name; //entity
    private $id_column; // ID column name
    
    
    /**
    * Class constructor used to establish connection to db
    */
    public function __construct($table_name, $id_column = 'id'){
        try {
        $this->table_name=$table_name;
        $this->id_column = $id_column;  // Save the ID column name
        $servername = Config::DB_HOST();
        $username = Config::DB_USERNAME();
        $password = Config::DB_PASSWORD();
        $dbname = Config::DB_SCHEMA();
        $port = Config::DB_PORT();
    
        $this-> conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
        $this-> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
    * Method used to get all entities from database
    */
    public function get_all(){
        $stmt =  $this->conn->prepare("SELECT * FROM " . $this->table_name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_id($id){
        $stmt =  $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE " . $this->id_column . " = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $stmt =  $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE " . $this->id_column . " = :id");
        $stmt->bindParam(':id',$id); #prevent sql injection
        $stmt->execute();
    }

    public function update($entity, $id){
        $query="UPDATE ".$this->table_name." SET ";
        foreach($entity as $column=>$value){
            $query.=$column . "=:".$column . ", ";
        }
        $query=substr($query,0,-2);
        $query.=" WHERE " . $this->id_column . " = :id";
        $stmt =  $this->conn->prepare($query);
        $entity['id']=$id;
        $stmt->execute($entity);
        return $entity;
    }

    //works for user
    public function add($entity){
        
        $query = "INSERT INTO " . $this->table_name . " (";
        foreach($entity as $column => $value){
            $query.=$column.', '; 
        }
        $query=substr($query, 0, -2);

        $query.=") VALUES (";
        foreach($entity as $column => $value){
            $query.=":" . $column . ', ';
        }
        $query=substr($query, 0, -2);
        $query.= ")";

        $stmt =  $this->conn->prepare($query);
        $stmt->execute($entity);
        $entity['id'] = $this->conn->lastInsertId();
        return $entity;
        }

    protected function query($query, $params){
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    protected function query_unique($query, $params){
        $results = $this->query($query, $params);
        return reset($results);
        }

}

?>
