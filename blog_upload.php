<?php
  $servername = "localhost";
  $username = "king";
  $password = "35@Thunder48";
  $db = "blog";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$db);

session_start();
   $email = $_SESSION['_email'];
   $sql = "select * from author where author_email = '$email'";
   $result = mysqli_query($conn, $sql);
   $row = $result->fetch_assoc();
    $title = $_POST['b_title'];
    $auth = $_POST['author'];
    $vw = $_POST['views'];
    $ct = $_POST['b_content'];
    $category = $_POST['b_category'];
    $lnk = $_POST['img_link'];
    echo $query = "insert into `blog_data`(`b_id`, `b_title`, `b_content`, `author`, `views`, `category`,`img_link`) VALUES (null,'$title','$ct','$auth','$vw','$category','$lnk')";
    mysqli_query($conn, $query);
    header('Location: /cms.php');



   ?>
