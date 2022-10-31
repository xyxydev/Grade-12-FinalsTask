<?php
//initialize variables
$txttitle = "";
$txtdetail = "";
$edit_state = false;
$id = 0;

//connect to event table
  $hostname ="localhost";
  $username ="root";
  $password ="";
  $dbname ="calendarevents";

  $error ="Cannot connect to database, Please try again later. . .";

   $connect = mysqli_connect($hostname,$username,$password, $dbname);
   mysqli_select_db($connect, $dbname);

   //If save button is clicked
    if (isset($_POST['save'])) {
    	$txttitle = mysqli_real_escape_string($connect, $_POST['txttitle']);
    	$txtdetail = mysqli_real_escape_string($connect, $_POST['txtdetail']);
    	$id = mysqli_real_escape_string($connect, $_POST['id']);

      $query = "INSERT INTO event Title='$txttitle', Detail='$txtdetail' WHERE id=$id";
      $result = mysqli_query($connect, $query);
      if($result){
      header("Location: eventform2.php");
      } else {
      echo "Error";
      }
    }

   //update records
   if (isset($_POST['btnadd'])) {
    	$txttitle = mysqli_real_escape_string($connect, $_POST['txttitle']);
    	$txtdetail = mysqli_real_escape_string($connect, $_POST['txtdetail']);
    	$id = mysqli_real_escape_string($connect, $_POST['id']);

    	$query = "UPDATE event SET Title='$txttitle', Detail='$txtdetail' WHERE id=$id";
    	mysqli_query($connect, $query);
    	if ($connect->query($query) === TRUE) {
     header("Location: eventform2.php");
        } else {
       echo "Error: " . $query . "<br>" . $connect->error;
       }
    	
    }

    //delete records
    if (isset($_GET['del'])) {
    	$id = $_GET['del'];

    	$query = "DELETE FROM event WHERE id=$id";
    	mysqli_query($connect, $query);
    	header('Location: eventform2.php');
    }
   //retrive records
   $results = mysqli_query($connect, "SELECT * FROM event");

?>




<?php 
            if (isset($_GET['day'])){
            $day = $_GET['day'];}

                else {
                $day = date("j");}

            if(isset($_GET['month'])){
            $month = $_GET['month'];}

                else {
                $month = date("n");}

            if(isset($_GET['year'])){
            $year = $_GET['year'];}

                else{
                $year = date("Y");}

            $currentTimeStamp = strtotime( "$day-$month-$year");
            $monthName = date("F", $currentTimeStamp);
            $numDays = date("t", $currentTimeStamp);
            $counter = 0;
?>






<?php 

  //LOGIN
  if (isset($_POST['Login'])) {
  	$IDnumber = ($_POST['IDnumber']);
	$Password = ($_POST['Password']);

	  //ensure that form is filled properly
	  if (empty($IDnumber)) {
	  	array_push($errors, "IDnumber is required");
	  }
	  if (empty($Password)) {
	  	array_push($errors, "Password is required");
	  }
	  if (count($errors) == 0) {
	  	$query = "SELECT * FROM studentregister WHERE IDnumber='$IDnumber' AND Password='$Password'";
	  	$result = mysqli_query($db, $query);
	  	if (mysqli_num_rows($result) == 0) {
	  		//user login
	  		$_SESSION['Fname'] = $Fname;
	  	    $_SESSION['success'] = "You are now logged in";
	  	    header('Location: cal1.php'); //redirected to home page
	  	}else{
	  		array_push($errors, "Wrong IDnumber/Password combnation");
	  	}
	  }
  }


  //LOGOUT
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['Fname']);
  	header('Location: CP%20PROJECT.php');

  }
?>