<?php include('loginconnection.php');
//fetch the record to be updated
     if (isset($_GET['edit'])) {
    	$id = $_GET['edit'];
    	$edit_state = true;
    	$rec = mysqli_query($connect, "SELECT * FROM event WHERE id=$id");
    	$record = mysqli_fetch_array($rec);
    	$txttitle = $record['Title'];
    	$txtdetail = $record['Detail'];
    	$id = $record['id'];

    }
?>
<html>
<head><
	<title>Add Event</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<center>
<div class="pane flipwrapper">
  
	<form name="eventform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
        <header>
        	<img src="University-of-Cebu-Logo.jpg" alt="UC Logo" class="dp">
          <h3>ADD EVENT</h3>
        </header>
		<div class="input-group">
		    <label>Title:</label>
		    <input style="max-width: max-content;" type="text" name="txttitle" value="<?php echo $txttitle; ?>">
	    </div>
	    <div class="input-group">
	    	<label>Detail:</label>
		    <input style="max-width: max-content;" type="text" name="txtdetail" value="<?php echo $txtdetail; ?>">
	    </div>
	    <div>
	    	<?php if ($edit_state == false): ?>
	    	<button class="btn" type="submit" name="save" >Save</button>
			<?php else: ?>
			<button class="btn" type="submit" name="btnadd" >Update</button>
	    	<?php endif ?>
	    </div>
	</form>
	<br>
</div>
<br>
<div class="pane flipwrapper" style="width: fit-content;">
	<header>
        <img src="University-of-Cebu-Logo.jpg" alt="UC Logo" class="dp">
        <h3>myUcPri EVENTS</h3>
    </header>
  	<div style="border: 1px solid black; width: min-content" class="entable">
  	<table border="1">
  		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Detail</th>
				<th>Event Date</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
			    <td><?php echo $row['id']; ?></td>
				<td><?php echo $row['Title']; ?></td>
				<td><?php echo $row['Detail']; ?></td>
				<td><?php echo $row['eventDate']; ?></td>
				<td style="background-color: green; font-weight: bold;">
					<a style="text-decoration: none; color: #111;" class="edit_btn" href="eventform2.php?edit=<?php echo $row['id']; ?>">Edit</a>
				</td>
				<td style="background-color: red; font-weight: bold;">
					<a style="text-decoration: none; color: #111;" class="del_btn" href="loginconnection.php?del=<?php echo $row['id']; ?>" onclick="myFunction()">Delete</a>
				</td>
				<script>
					function myFunction(){
						confirm("You can't undo this action!");
					}
				</script>
			 </tr>
			<?php } ?>	
		</tbody>
  	</table>
  	<br>
  	<a href="cal1.php">Back to Calendar</a>
  	</div>
</div>
</center>
</body>

</html>