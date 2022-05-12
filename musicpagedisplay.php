<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
body{
  background-image: url('abhinith.jpg');

  background-repeat: no-repeat;
  background-size: 1440px 1080px;
  background-position: center;
  background-size: cover;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightgreen;
}

li {
  float: left;

}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
.B{
  float:right;
}
audio{
  width:200px;
}
.Q{
  background-color: lightgrey;
 width: 200px;
 height: 200px;
 border: 1px solid green;
 padding: 10px;
 margin: 1px;
}



</style>
</head>
<body>

<ul>
  <li><a  href="musicpagedisplay.php">Home</a></li>
  <li><a href="fav.php">MyFav</a></li>
  <li><a href="artist.php">Artist</a></li>
  <li><a href="#about">Genre</a></li>
    <li><a href="playall.php">PlayAll</a></li>
    <li><a href="upload.php">UploadSong</a><li>
<li class="B" ><a href="logout.php">Logout</a></li>
</ul>
<br>



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
$musicid=1;
echo "<div class='row'>";
while($musicid<=10){
  $url="m".$musicid.".jpg";
  $url1="m".$musicid.".mp3";
  $url2="musicpagedisplay.php?mid=";
  $url3="musicpagedisplay.php?delid=";


?>

<div class="col-lg-3">
<img src="<?php echo $url;?>" height="200" width="200">
<br>


<audio controls>

  <source src="<?php echo $url1;?>" type="audio/mp3">


</audio>
<br>
<a href="<?php echo $url2.$musicid;?>"><button type="button" name="ggadd">AddToFav</button></a>

<a href="<?php echo $url3.$musicid;?>"><button type="button" name="ggdel">DelFromFav</button></a>


</div>

<?php
$musicid++;
}
$c=$_SESSION['uid'];
$result2=mysqli_query($con,"select file_name from images where userid='$c'");
if (mysqli_num_rows($result2) > 0) {
  // output data of each row
while($row = mysqli_fetch_assoc($result2)) {

  $url4=$row["file_name"].".mp3";

?>
<div class="col-lg-3">


<div class="Q">
<CENTER>
  <p> <?php echo ucfirst($row["file_name"]); ?> </p>
</CENTER>
</div>
<audio controls >

    <source src="<?php echo $url4;?>" type="audio/mp3">


</audio>
<br>
<a href="<?php echo $url2.$musicid;?>"><button type="button" name="ggadd">AddToFav</button></a>

<a href="<?php echo $url3.$musicid;?>"><button type="button" name="ggdel">DelFromFav</button></a>
</div>

<?php
}
}
if(isset($_GET['mid'])){
  $cid=$_SESSION['uid'];
  $musid=$_GET['mid'];
  echo $cid.' '.$musid;
  $result2=mysqli_query($con,"select songid from myfav where id='$cid' and songid='$musid'")
          or die("failed to query database".mysqli_error());
  $row=mysqli_fetch_array($result2);
  if(empty($row))
  {$query="insert into myfav(id,songid) values($cid,$musid);";
  $result=mysqli_query($con,$query);
}
}
else if(isset($_GET['delid'])){
  $cid=$_SESSION['uid'];
  $musid=$_GET['delid'];
  echo $cid.' '.$musid;
  $query="delete from myfav where id='$cid' and songid='$musid'";
  $result1=mysqli_query($con,$query);

}

?>
</body>
</html>
