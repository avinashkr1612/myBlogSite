<?php
echo $name = $_FILES['file']['name'];
$to = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $to);
echo "uploaded";
echo $email = $_POST['email'];


$servername = "localhost";
$username = "king";
$password = "35@Thunder48";
$db = "blog";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
 $username = $_POST['author'];
 $a_email = $_POST['email'];
 $image_url = $to;
 $pass =  $_POST['pass'];
 $query = "INSERT INTO `author`(`author_name`, `author_email`, `img_url`, `author_password`) VALUES ('$username','$a_email','$image_url','$pass')";
mysqli_query($conn, $query);
session_start();
$_SESSION['_email'] = $email;
header("Location: /cms.php");

 ?>
