<?php include('loginconnection.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])) {
    	$id = $_GET['edit'];
    	$edit_state = true;
    	$rec = mysqli_query($db, "SELECT * FROM studentregister WHERE id=$id");
    	$record = mysqli_fetch_array($rec);
    	$IDnumber = $record['ID_Number'];
    	$Lname = $record['Last_Name'];
    	$Fname = $record['First_Name'];
    	$Password = $record['Password'];
    	$id = $record['id'];

    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT USER ACCOUNTS</title>
	<link rel="stylesheet" type="text/css" href="crud.css">
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>ID_Number</th>
				<th>Last_Name</th>
				<th>First_Name</th>
				<th>Password</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
		 <tr>
				<td><?php echo $row['ID_Number']; ?></td>
				<td><?php echo $row['Last_Name']; ?></td>
				<td><?php echo $row['First_Name']; ?></td>
				<td><?php echo $row['Password']; ?></td>
				<td>
					<a class="edit_btn" href="updalot.php?edit=<?php echo $row['id']; ?>">Edit</a>
				</td>
				<td>
					<a class="del_btn" href="loginconnection.php?del=<?php echo $row['id']; ?>">Delete</a>
				</td>
		 </tr>
			<?php } ?>
		</tbody>
	</table>

	<form method="post" action="loginconnection.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>ID_Number</label>
			<input type="text" name="IDnumber" value="<?php echo $IDnumber; ?>">
		</div>
		<div class="input-group">
			<label>Last_Name</label>
			<input type="text" name="Lname" value="<?php echo $Lname; ?>">
		</div>
		<div class="input-group">
			<label>First_Name</label>
			<input type="text" name="Fname" value="<?php echo $Fname; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="Password" value="<?php echo $Password; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_state == false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
			<?php else: ?>
			<button class="btn" type="submit" name="update" >Update</button>
			<?php endif ?>
			
		</div>
	</form>

</body>
</html>