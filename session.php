<?php
session_start();
$message="";
if(count($_POST)>0) {
 $con = mysqli_connect('localhost','root','','calendarevents') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM projectcp WHERE ID='" . $_POST["ID"] . "' and Password = '". $_POST["Password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["ID"] = $row['ID'];
$_SESSION["Password"] = $row['Password'];
} else {
$message = "Invalid ID or Password!";
}
}
if(isset($_SESSION["ID"])) {
header("Location:cal1.php");
}
?>