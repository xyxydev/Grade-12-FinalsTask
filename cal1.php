<?php include('loginconnection.php'); ?>
    <html>
     <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php echo $_SESSION['success'];
                          unset($_SESSION['success']);
                     ?>
                </h3>   
            </div>
        <?php endif ?> 

        <?php if (isset($_SESSION["Fname"])): ?>
            <p>Welcome <strong><?php echo $_SESSION['Fname']; ?></strong></p>
            <p><a href="cal1.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
     </div>

    <h1>UC Events Portal Attendance</h1>
    <style>
        h1{
            border-style: solid;
            border: 0px 0px 0px 0px;
            border-color:black;
            padding:20px 10px 10px 10px;
            text-align: center;
            background-color: gray;
        }

        .btn{ /*BUTTONS*/
  width:100%;
  background: #222;
  color:#fff;
  border: none;
  border-radius: 5px;
  height:35px;
  margin-top: 10px;
  cursor: pointer;
  transition: all .3s ease-in;
  font-size: 14px;
}

        .today {
    background-color: #999;
}
            
.event {
    background-color: #000000;
}

table td, tr {
    
    padding:5px 20px 5px 20px;
    color: #000000;
}

table {
    background-color: #eee;
}

body{
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: Arial, Roboto, sans-serif;
}

a{
    text-decoration: none;
}

.pula{
    color: red; 
}


    </style>

    <head>
        
        <script>
            function goLastMonth(month, year) {
                if (month == 1) {
                    --year;
                    month = 13;
                }
                --month
                var monthstring = "" + month + "";
                var monthlength = monthstring.length;
                if (monthlength <= 1) {
                    monthstring = "0" + monthstring;
                }
                document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month=" + monthstring + "&year=" + year;
            }

            function goNextMonth(month, year) {
                if (month == 12) {
                    ++year;
                    month = 0;
                }
                ++month
                var monthstring = "" + month + "";
                var monthlength = monthstring.length;
                if (monthlength <= 1) {
                    monthstring = "0" + monthstring;
                }
                document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month=" + monthstring + "&year=" + year;
            }
        </script>
    </head>

    <body>
        <center>
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
        <?php //if add button is clicked
            if (isset($_GET['add'])) {
            $title = $_POST['txttitle'];
            $detail = $_POST['txtdetail'];

            $eventdate = $month."/".$day."/".$year;

            $query = "INSERT into event (Title,Detail,eventDate,dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
            mysqli_query($connect, $query);
            header('Location: eventform2.php');
            }
           if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['Fname']);
    header('Location: CP%20PROJECT.php');

  }

        ?>
        <table border="2" style="margin: 0px;
    font-size: 20px;
    width: max-content;">
            <tr>
                <td>
                    <input style='width:100px;' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month." , ".$year?>)">
                </td>
                <td colspan='5'>
                    <?php echo $monthName.", ".$year; ?>
                </td>
                <td>
                    <input style='width:100px;' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month." , ".$year?>)">
                </td>
            </tr>
            <tr>
                <td class="pula" width='100px'>Sun</td>
                <td width='100px'>Mon</td>
                <td width='100px'>Tue</td>
                <td width='100px'>Wed</td>
                <td width='100px'>Thu</td>
                <td width='100px'>Fri</td>
                <td width='100px'>Sat</td>
            </tr>
                
            <?php
            echo "<tr>";
            for($i = 1; $i < $numDays+1; $i++, $counter++){
            $timeStamp = strtotime("$year-$month-$i");
                if($i == 1) {
                $firstDay = date("w", $timeStamp);
                    for($j = 0; $j < $firstDay; $j++, $counter++) {
                    echo "<td>&nbsp;</td>";
                    }
                }
                if($counter % 7 == 0) {
                echo"</tr><tr>";
                }

            $monthstring = $month;
            $monthlength = strlen($monthstring);
            $daystring = $i;
            $daylength = strlen($daystring);
                if($monthlength <= 1){
                $monthstring = "0".$monthstring;
                }
                if($daylength <=1){
                $daystring = "0".$daystring;
                }
            $todaysDate = date("m/d/Y");
            $dateToCompare = $monthstring. '/' . $daystring. '/' . $year;
            echo "<td align='center' ";
                if ($todaysDate == $dateToCompare){
                echo "class ='today'";
                } else{

                }
                echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
                }
            echo "</tr>";
            ?>
        </table>
        <?php
            if(isset($_GET['v'])) {
            echo "<hr>";
            echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a>";
            if(isset($_GET['f'])) {
            include("eventform2.php");
            }

            }
        ?>
        <a class="btn" href="eventform2.php">View My UC Events</a><br><br>
        <a class="btn" href="CP%20PROJECT.php">Logout</a>
    </center>
    </body>

    </html>