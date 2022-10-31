<?php

$link = mysql_connect("localhost", "root", "", "students");



if($link === false){
	 die("lol." . mysqli_connect_erro());
}

$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$ID = mysqli_real_escape_string($link, $_REQUEST['ID']);
$Address = mysqli_real_escape_string($link, $_REQUEST['Address']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);


$sql = "INSERT INTO student (id, name, section, address, email, password, role) VALUES('$ID', '$username', '$section', '$address', '$Email', '$Pass', 'student')";
if(mysqli_query($link, $sql)){
	 header('Location: ../view/studentform.html');	

} else{
	echo "Error: Cant Execute $sql. ". mysqli_error($link);
}


mysqli_close($link);
?>