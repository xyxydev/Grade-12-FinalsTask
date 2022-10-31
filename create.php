<?php 
     require('database.php');

     if (isset($_POST['create'])) {
     	$txttitle = $_POST['Title'];
     	$txtdetail = $_POST['Detail'];

     	$querycreate= "INSERT INTO event VALUES(null, '$Title', '$Detail')";
     	$sqlcreate= mysqli_query($connection, $querycreate);

     	echo '<script>alert("Successfully created!")</script>';
     	echo '<script>window.location.href = "indexs.php"</script>';
     }
 ?>