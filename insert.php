<?php
 
    require_once("loginconnection.php"); ?>
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
 
   <? if(isset($_POST['submit']))
    {
        if(empty($_POST['title']) || empty($_POST['detail']) || empty($_POST['eventdate']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {

            $title = $_POST['Title'];
            $detail = $_POST['Detail'];
            $eventdate = $month."/".$day."/".$year;
 
            $query = " insert into event (Title, Detail, eventDate) values('$title','$detail','$eventdate')";
            $result = mysqli_query($connect,$query);
 
            if($result)
            {
                header("location:view.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:formview.php");
    }
 
 
 
?>