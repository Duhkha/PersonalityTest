<?php
 
 
// require_once("rest/dao/UsersDao.class.php");

// $users_dao= new UsersDAO();

// $results=$users_dao->get_all();
// print_r($results);
 
 
 
 /*
 //zehra connection 
 $servername = "localhost";
 $username = "root";
 $password = "root";
 $schema = "personalitytest";
 
 try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  $stmt = $conn->prepare("SELECT * FROM questions");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  print_r($result);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/ 
 
 
 
 
 
 
 
 
 /*
 //ismar connection
 $servername = "localhost";
 $username = "root";
 $password = "69w33d420";
 $dbname = "personalitydb";

 try {
    // Create database connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

	// Prepare SQL statement
	$stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);







  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
*/




?>