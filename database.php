<?php 
     //connect to event table
  $hostname ="localhost";
  $username ="root";
  $password ="";
  $dbname ="calendarevents";

  $error ="Cannot connect to database, Please try again later. . .";

   $connect = mysqli_connect($hostname,$username,$password, $dbname);
   mysqli_select_db($connect, $dbname);

   if (mysqli_connect_error()) {
   	echo "Error: Unable to connect to Mysql <br>";
   	echo "Message: ".mysqli_connect_error()."<br>";
   }else{
   	echo "Successfully connected!";
   }
?>