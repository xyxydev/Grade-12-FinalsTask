<?php
$con = mysqli_connect("localhost", "root", "", "studentform");

if (!$con) {
	die("Error" . mysqli_connect_error());
}

?>