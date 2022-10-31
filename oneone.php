<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "calendarevents";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
 if (isset($_GET['save'])) {
            $title = $_POST['txttitle'];
            $detail = $_POST['txtdetail'];

            $sqlinsert = "INSERT into event(Title,Detail) values ('".$title."','".$detail."')";
            $resultinginsert = mysqli_query($connect,$sqlinsert);
            if($resultinginsert ){
            echo "Event Successfully Added.";
            }else{
           echo "Event Failed to Add. Please Refresh or Try Again Later.";
           }
$conn->close();
}
?>
