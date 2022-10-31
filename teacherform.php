<?php include('connecting2.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script>
	</script>
</head>
<body link="" vlink="" alink="">
	<center>
    <div class="pane flipwrapper">
        <header>
          <img src="University-of-Cebu-Logo.jpg" alt="UC Logo" class="dp">
          <h3>UNIVERSITY OF CEBU-PRI<br>TEACHER REGISTRATION FORM</h3>
          <span>*Please type all necessary fields</span>
        </header>  

        <form name="myform" method="POST" action="teacherform.php">
        	<div class="field">
			<input type="hidden" name="id" value="<?php echo $number; ?>">
			</div>
			<div class="field">
			<input type="number" placeholder="ID Number*" name="IDnumber" required>
			</div>
        	<div class="field"> 
            <input type="text" placeholder="Last Name*" name="Lname" required>
          	</div>
          	<div class="field"> 
            <input type="text" placeholder="First Name*" name="Fname" required>
          	</div>
          	<div class="field"> 
            <input type="text" placeholder="Middle Inital" name="middle" maxlength="2">
          	</div>
          	<div class="field">
          		<select name="AdvisoryYL" required>
				<option selected hidden>Advisory Year Level*</option>
				<option value="Grade 11">Grade 11</option>
				<option value="Grade 12">Grade 12</option>
				</select>
			</div>
			<div class="field">
          		<select  name="AdvisoryTS" required>
				<option selected hidden>Advisory Track/Strand*</option>
				<option value="STEM">STEM</option>
				<option value="ABM">ABM</option>
				<option value="HUMSS">HUMSS</option>
				<option value="GAS">GAS</option>
				<option value="TECH VOC/ITCP-CSS">TECH VOC/ITCP-CSS</option>
				<option value="TECH VOC/COOKERY">TECH VOC/COOKERY</option>
				<option value="TECH VOC/TS">TECH VOC/TS</option>
				<option value="ARTS & DESIGN">ARTS & DESIGN</option>
				</select>
			</div>
			<div class="field">
				<select name="Subject" required>
					<option selected hidden>Subject Handled*</option>
					<option value="English">English</option>
					<option value="Filipino">Filipino</option>
					<option value="Math">Math</option>
					<option value="PhySci">PhySci</option>
					<option value="Chem">Chem</option>
					<option value="Science">Science</option>
					<option value="Social Sciences">Social Sciences</option>
					<option value="Physical Education">Physical Education</option>
					<option value="ETech">ETech</option>
					<option value="Major">CP</option>
					<option value="Major">HS</option>
				</select>
			</div>
			<select name="Gender" required>
				<option selected hidden>Gender*</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<div class="field">
			<input type="number" placeholder="Age*" min="00" max="99" maxlength="2" name="Age" required>
			</div>
			<br>
			<div class="field">
				<input type="password" minlength="8" name="Password" placeholder="Password*" required>
			</div>
			<input type="checkbox" class="chkbx" required>I've read and agreed to the Terms and Conditions.
			<input type="submit" class="btn" name="Submit">

        </form>
        	<div class="text-right p-t-8 p-b-31">
              <a href="CP%20PROJECT.php">Back</a>
            </div>
    </div>
  </center>
</body>
</html>