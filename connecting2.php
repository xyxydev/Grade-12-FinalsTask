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
	$AdvisoryYL = $_POST['AdvisoryYL'];
	$AdvisoryTS = $_POST['AdvisoryTS'];
	$Subject = $_POST['Subject'];
	$Gender = $_POST['Gender'];
	$Age = $_POST['Age'];
	$Password = $_POST['Password'];

$sql = "INSERT INTO teacherregister (ID_Number, Last_Name, First_Name, Middle_Initial, Advisory_Year_Level, Advisory_Track_Strand, Subject_Handled, Gender, Age, Password) VALUES ('$IDnumber','$Lname','$Fname','$middle','$AdvisoryYL','$AdvisoryTS','$Subject','$Gender','$Age','$Password')";

if ($conn->query($sql) === TRUE) {
    header("Location: okok.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>