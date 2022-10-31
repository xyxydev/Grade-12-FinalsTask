<?php 
     require('read.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CRUD</title>
</head>
<style>
	html, body{
		margin: 0;
		padding: 0;
	}
	.main{
		height: 100vh;

		/*GRID*/
		display: grid;
		grid-template-rows: auto 1fr;
		justify-content: center;
		grid-row-gap: 20px;
	}
	.main .create-main{
		grid-row: 1/2;
		display: grid;
		grid-auto-rows: auto;
		grid-row-gap: 5px;
	}
	.main .create-main h3{
		text-align: center;
	}
	.main .read-main{
		grid-row: 2/3;
	}
	.main .read-main tr th{
		width: 200px;
	}
	.main .read-main tr td{
		text-align: center;
	}
	.main .read-main tr td:nth(4){
		display: grid;
		grid-auto-flow: column;
	}
</style>
<body>
	<div class="main">
		<form class="create-main" action="#" method="get">
			<h3>MY UC PRI EVENTS</h3>
			<input type="text" name="username" placeholder="Enter your  username" required/>
			<input type="text" name=""required placeholder="Enter nothing">
			<input type="submit" name="create"value="CREATE">
		</form>

		<table class="read-main">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Detail</th>
				<th>Actions</th>
			</tr>
			<?php while ($results = mysqli_fetch_array($sqlevent)) { ?>

			<tr>
				<td><?php echo $results['id'] ?></td>
				<td><?php echo $results['Title']?></td>
				<td><?php echo $results['Detail']?></td>
		    <td>
			<form action="#" method="get">
				<input type="submit" name="edit" value="EDIT">
			</form>
			<form action="#" method="get">
				<input type="submit" name="delete" value="DELETE">
			</form>
		</td>
	</tr>
<?php } ?>
</table>
</div>

</body>
</html>