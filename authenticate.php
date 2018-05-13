<?php
$servername = "localhost";
$username = "king";
$password = "35@Thunder48";
$db = "blog";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
 $a_email = $_GET['email'];
 $pass =  $_GET['pass'];
 echo $query = "select * from author where author_email = '$a_email'";

 $result = mysqli_query($conn, $query);
 $row = $result->fetch_assoc();
 if($row['author_password'] == $pass)
{  session_start();
  $_SESSION['_email'] = $a_email;
  header("Location: /cms.php");
}
else {
  header("Location: /index.php");
}
 ?>
