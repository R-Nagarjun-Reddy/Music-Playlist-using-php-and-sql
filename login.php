<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
<style>
 .GG{background-image:url('loginbackgroundtest.jpg');
 background-size:1300px 600px;
 background-repeat:no-repeat;
background-size: cover;}
 .A{
   background-image:url('images.jpg');
   background-size:500px 500px;
   position:center;
   margin-left:30px;
   margin-top:35px;
   max-width:200px;
   padding:45px;
   border: 2px solid black;
   border-radius: 12px;



 }
 .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.7;
}

.btn:hover {
  opacity: 1;
}
input[type=text]:focus{
  border: 2px solid #555;
  border-radius: 8px;
  background-color: #ADD8E6;
}
input[type=password]:focus{
  border: 2px solid #555;
  border-radius: 8px;
  background-color: #ADD8E6;
}
</style>

</head>
<body class="GG" >
  <div class=bg-img>
    <CENTER>
      <h1 style="color:blue">Welcome to Music....</h1>
      </CENTER>
    <form action="process.php" method="POST" class="A">
      <h2>Login</h2>
        <p>
            <lable>Username</lable>
            <input type="text" placeholder="Enter your username" id="user" name="user"/>
        </p>
        <p>
            <lable>Password</lable>

            <input type="password" placeholder="Enter your password" id="pass" name="pass"/>
        </p>
        <p>
            <input type="submit" class="btn" id="button" value="Login"/>
        </p>
        <p>
          Do not have an account?
         <a href="registration.php">Register here</a>
        </p>
    </form>

  </div>

</body>
</html>
