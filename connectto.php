<?php
$hostname = "localhost"; 
$username = "root"; 
$dbname = "amor"; 

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Submit'])) { 
	$ID = $_POST['ID'];  
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Strand = $_POST['Strand'];
	$Password = $_POST['Password'];

$sql = "INSERT INTO kith (ID, First_Name, Last_Name, Strand, Password) VALUES ('$ID','$FirstName','$LastName','$Strand','$Password')"; 

if ($conn->query($sql) === TRUE) {
    header("Location: amor.html"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
 ?>
