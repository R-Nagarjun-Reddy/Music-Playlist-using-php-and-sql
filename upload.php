<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
body{


  background-repeat: no-repeat;
  background-size: 1440px 1080px;
  background-position: center;
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
// Database configuration
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"login");
$c=$_SESSION['uid'];

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
error_reporting(0);
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
<?php
// Include the database configuration file

$statusMsg = '';

// File upload path
$targetDir = "C:\xampp\htdocs\DBMS";
$fileName = basename($_FILES["file"]["name"]);

$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$x = pathinfo($fileName, PATHINFO_FILENAME);
echo $x;

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('mp3');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if($_SERVER['DOCUMENT_ROOT'].'/$fileName'){
            // Insert image file name into database
            $query="insert into images (userid,file_name) values ('$c','$x');";
            $insert=mysqli_query($con,$query);

             echo $insert;
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
$url=$x.".mp3";

?>


</body>
</html>
