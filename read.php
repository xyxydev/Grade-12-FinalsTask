<?php 
     require('database.php');

     $queryevent = "SELECT * FROM event";
     $sqlevent = mysqli_query($connect, $queryevent);
?>