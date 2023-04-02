<?php
  require_once("rest/dao/UsersDao.class.php");

  $users_dao= new UsersDAO();
 
  $firstname=$_REQUEST['firstname'];
  $lastname=$_REQUEST['lastname'];

  $results=$users_dao->add($firstname, $lastname);
  print_r($results);



 /*
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


    print_r($_REQUEST);
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
	// Prepare SQL statement
	$stmt = $conn->prepare("INSERT INTO users (firstname, lastname) VALUES ('$firstname', '$lastname')");



    $stmt->execute();
    $result = $stmt;
    print_r($result);


	// Bind parameters to values
	$stmt->bindParam(':value1', $value1);
	$stmt->bindParam(':value2', $value2);
	$stmt->bindParam(':value3', $value3);

	// Set parameter values
	$value1 = "John";
	$value2 = "Doe";
	$value3 = "john.doe@example.com";

	// Execute statement
	$stmt->execute();

	echo "Data inserted successfully";







  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  



*/

?>