<!doctype html>
<html>
<head>
  <?php
    $servername = "localhost";
    $username = "king";
    $password = "35@Thunder48";
    $db = "blog";
      $conn = mysqli_connect($servername, $username, $password,$db);
    $_id = $_REQUEST['id'];
    // Create connection
    $query = "SELECT * FROM `blog_data` WHERE b_id = $_id";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();

    $view_inc = $row['views'] + 1;
    $query3 = "UPDATE `blog_data` SET `views`= $view_inc WHERE b_id = ".$row['b_id'];
    mysqli_query($conn,$query3);
   $query2 = "Select * from author where author_name = '".$row['author']."'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = $result2->fetch_assoc();
    $row2['author_name'];

     ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THE BLOG</title>
  <link rel="stylesheet" href="css/bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Styles -->
  <style>
  body{
    background: url('img/bg.png');
  }

  *{
    font-family: -apple-system,BlinkMacSystemFont, "Segoe UI";
  }
  </style>

  <body>
      <nav class="navbar is-shadowed  is-primary">
          <div class="navbar-brand">
            <div class="navbar-item">
              <h1 class="title is-5">
                MeraBlogSite
              </h1>
            </div>
            <div class="burger navbar-burger" data-target="navbar-content">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="navbar-menu" id="navbar-content">
            <div class="navbar-end" style="font-size:24px;">
              <a href="#" class="navbar-item ">
                <span class="icon"><i class="fab fa-twitter"></i></span>

              </a>
              <a href="#" class="navbar-item">
                <span class="icon"><i class="fab fa-facebook-square"></i></span>
              </a>
              <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fab fa-github"> </i>
                </span>

              </a>
            </div>
          </div>
        </nav>
        <div class="container" >
          <nav class="breadcrumb" >
          <ul>
            <li><a href="../">MeraBlogSite</a></li>
            <li><a href="../">Blog</a></li>
          </ul>
        </nav>
        <div class="hero">
          <div class="title is-3" style="padding:0 20px;">
            <?php echo $row['b_title']  ?>;
          </div>
          <figure class="image" style="overflow:hidden">
            <img src="<?php echo $row['img_link']?>" alt="">
          </figure>

          <div class="hero is-white">
            <div class="media" style="padding-left:20px;">
                <div class="media-left" style="width:80px;height:80px;overflow:hidden;border-radius:50%;position:relative;top:-30px;">
                  <img src="<?php echo $row2['img_url']?>" alt="">
                </div>
                <div class="media-content">
                    <span class="title is-5"><?php echo $row['author'] ?></span><br>
                </div>
            </div>
            <div class="hero-body">


            <p class="subtitle is-5">
              <?php echo $row['b_content'] ?>
            </p>
                      </div>
          </div>

          </div>
          <div class="footer has-text-light" style="background:#00d1b2;">
          <div class="container-hd has-text-centered  ">
            <p class="subtitle is-5 has-text-light"> This is <strong>footer</strong> </p>
          </div>
          </div>
        </div>
      </body>
      </html>
