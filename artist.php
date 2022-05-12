<?php
if(!isset($_SESSION))
    {
        session_start();
    }
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"login");

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
