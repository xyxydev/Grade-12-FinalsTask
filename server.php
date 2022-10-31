<?php
   session_start();
    //Initialize variables
    $name = "";
    $address = "";
    $id = 0;
    $edit_state = false;

    //connect to database
    $db = mysqli_connect('localhost', 'root', '', 'crud');

    //If save button is clicked
    if (isset($_POST['save'])) {
    	$name = $_POST['name'];
    	$address = $_POST['address'];
    	$id = $_POST['id'];

    	$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
    	mysqli_query($db, $query);
    	$_SESSION['message'] = "Address saved"; 
    	header('Location: indexx.php'); //redirect to indexx page after inserting

    }

    //update records
    if (isset($_POST['btnadd'])) {
    	$name = $_POST['name'];
    	$address = $_POST['address'];
    	$id = $_POST['id'];

    	$query = "UPDATE info SET name='$name', address='$address' WHERE id=$id";
    	mysqli_query($db, $query);
    	$_SESSION['message'] = "Address updated"; 
    	header('Location: indexx.php');
    }

    //delete records
    if (isset($_GET['del'])) {
    	$id = $_GET['del'];

    	$query = "DELETE FROM info WHERE id=$id";
    	mysqli_query($db, $query);
    	$_SESSION['message'] = "DELETED"; 
    	header('Location: indexx.php');
    }


    //retrieve records
    $results = mysqli_query($db, "SELECT * FROM info");




?>