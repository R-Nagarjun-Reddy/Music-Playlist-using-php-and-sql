<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"login");
//values from login.php file
$username=$_POST['user'];
$password=$_POST['pass'];
// prevent injections
$username=stripslashes($username);
$password=stripslashes($password);
$username= mysqli_real_escape_string($con,$_POST['user']);
$password= mysqli_real_escape_string($con,$_POST['pass']);

//connect to server


//Query the db from user
$result=mysqli_query($con,"select * from logindetails where username='$username' and password='$password'")
        or die("failed to query database".mysqli_error());
$row=mysqli_fetch_array($result);

if(!empty($row['username'])&& !empty($row['password'])){
if($row['username']==$username && $row['password']==$password){
  $_SESSION['uid']=$row['id'];
    include 'musicpagedisplay.php';
}
}
else
{
    echo nl2br("Invalid username or Password\n");
    echo "Please enter the correct details\n";
    //header('Location:login.php');
    include 'login.php';

}

?>
