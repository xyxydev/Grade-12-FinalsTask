<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "calendarevents";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Submit'])) {
	$id = $_POST['id'];
	$IDnumber = $_POST['IDnumber'];
	$Lname = $_POST['Lname'];
	$Fname = $_POST['Fname'];
	$middle = $_POST['middle'];
	$yearlevel = $_POST['yearlevel'];
	$trackstrand = $_POST['trackstrand'];
	$Gender = $_POST['Gender'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];

$sql = "INSERT INTO studentregister (ID_Number, Last_Name, First_Name, Middle_Initial, Year_Level, Track_Strand, Gender, Age,	Password) VALUES ('$IDnumber','$Lname','$Fname','$middle','$yearlevel','$trackstrand','$Gender','$Age','$Password')";
if ($conn->query($sql) === TRUE) {
    header("Location: okok.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

 ?>