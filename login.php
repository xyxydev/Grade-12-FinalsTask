<?php include('login2.php'); ?>
<?php

$link = mysqli_connect("localhost", "root", "", "calendarevents");

if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}


	$IDnumber = mysqli_real_escape_string($link, $_REQUEST['IDnumber']);
	$Password = mysqli_real_escape_string($link, $_REQUEST['Password']);

	$sql ="SELECT * FROM studentregister WHERE ID_Number = '".$IDnumber."'";
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_assoc($result)) {

			if($Password == $row["Password"]){
				session_start();
				$_SESSION['isLoggedIn'] = true;
				header("Location: cal1.php");
					}

			else{
				 echo "INCORRECT PASSWORD!";
				}
		}
	}
	mysqli_close($link);
?>


