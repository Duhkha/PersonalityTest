<?php

class UsersDao{

    private $conn;

    public function __construct(){
        $servername = "localhost";
    $username = "root";
    $password = "69w33d420";
    $dbname = "personalitydb";
    
    try {
      
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $this-> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";


} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

}
//method used to get all users from data
public function get_all(){
   $stmt =  $this->conn->prepare("SELECT * FROM users");
   $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  
}

public function get_by_id($id){
    $stmt =  $this->conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$id]);
     return $stmt->fetch();
   
 }

public function add($firstname, $lastname){
    $stmt =  $this->conn->prepare("INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)");
    $result = $stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname]);
    $student['id'] = $this->conn->lastInsertId();
}

public function update($user,$id){
   $user['id']=$id;
    $stmt =  $this->conn->prepare("UPDATE users SET firstname=:firstname , lastname=:lastname WHERE id=:id");
    $stmt->execute($user);


}

public function delete($id){
    $stmt =  $this->conn->prepare("DELETE FROM users WHERE id=:id");
    $stmt->bindParam(':id',$id); //prevent sql injection
    $stmt->execute();
}



}

?>