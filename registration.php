<!DOCTYPE html>
<html>
<head>
    <title>SignUp Page</title>
<style>
 .GG1{background-image:url('loginbackgroundtest.jpg');
 background-size:1300px 600px;
 background-repeat:no-repeat;}
 .A1{
   background-image:url('login.jpg');
   background-size:500px 500px;
   position:center;
   margin-left:30px;
   margin-top:35px;
   max-width:200px;
   padding:45px;
   
 }
 .btn1 {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn1:hover {
  opacity: 1;
}
</style>

</head>
<body class="GG1" >
  <div class=bg-img1>
    <CENTER>
      <h1 style="color:blue">Welcome to Music....</h1>
      </CENTER>  
    <form action="logininsertdb.php" method="POST" class="A1">
      <h2>SignUp</h2>
        <p>
            <lable>Username</lable>
            <input type="text" id="user" name="user"/>
        </p>
        <p>
            <lable>Password</lable>
            <input type="password" id="pass" name="pass"/>
        </p>
        <p>
            <lable>Comfirm Password</lable>
            <input type="password" id="cpass" name="cpass"/>
        </p>
        <p>
            <input type="submit" class="btn1" id="button" value="Register"/>
        </p>
        <p>
            Already have an account?
            <a href="login.php">Login here</a>
        </p>
            
    </form>

  </div>

</body>
</html>