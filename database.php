<?php
// Connect to MySQL
$con = mysqli_connect("localhost", "root", "", "jsshoutbox") or die(mysqli_error($con));
session_start();
//session_destroy();
//session_unset();
?>
