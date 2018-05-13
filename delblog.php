<?php
$servername = "localhost";
$username = "king";
$password = "35@Thunder48";
$db = "blog";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
$_id = $_GET['id'];
 $query = "DELETE FROM `blog_data` WHERE b_id = '$_id';";
mysqli_query($conn, $query);
header("Location: /cms.php");
 ?>
