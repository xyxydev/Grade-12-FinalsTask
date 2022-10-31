<?php
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["Password"]);
header("Location:CP%20PROJECT.php");
?>