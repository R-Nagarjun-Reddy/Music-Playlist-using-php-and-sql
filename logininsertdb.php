<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"login");
$username=$_POST['user'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
if(!empty($username) && !empty($password)&& !empty($cpassword)){
    if($password==$cpassword){
        $result=mysqli_query($con,"select username from logindetails where username='$username'");
        $row=mysqli_fetch_array($result);
        
        if(!empty($row)){
            echo"Username already used.Try using another name\n";
            include 'registration.php';
        }
        else{
            $row1=mysqli_query($con,"insert into logindetails(username,password) values('$username','$password')");
            include 'login.php';
        }
    }
    else{
        echo"Passwords dont match\n";
        include 'registration.php';
    }
   
}
else{
    echo"Please enter correct details\n";
    include 'registration.php';
} 
?>
