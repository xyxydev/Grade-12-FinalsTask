<?php include('loginconnection.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>UCPri Hub</title>
  
  </script>
  <link rel="stylesheet" media="screen" href="style.css">
  <link rel="shortcut icon" type="image/x-icon" href="1574842392.ico">
</head>
<body> 
  <center>
    <div class="pane flipwrapper">
        <header>
          <img src="University-of-Cebu-Logo.jpg" alt="UC Logo" class="dp">
          <h3>WELCOME TO</br>UNIVERSITY OF CEBU-PRI!</h3>
          <span>Please enter your ID number to continue</span>
        </header>  

        <form name="myform" method="post" action="login.php" method="POST">
          <div class="field">
            <input type="number" name="IDnumber" placeholder="ID Number" required>
          </div>
          <div class="field">
              <input type="password" minlength="8" name="Password" placeholder="Password" required>
            </div>
            <div class="text-right p-t-8 p-b-31">
              <a href="#">
                Forgot password?
              </a>
            </div>
          
          <input type="submit" class="btn" value="Log in" name="Login">
          <input type="button" class="btn"  onclick="window.location.href = 'register.html';" value="Sign Up">
        </form>

      </div>

    </div>
  </center>
  
   