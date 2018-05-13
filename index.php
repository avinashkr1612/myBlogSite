<!DOCTYPE html>
<html>
<head>
<?php
  $servername = "localhost";
  $username = "king";
  $password = "35@Thunder48";
  $db = "blog";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$db);
  $query = "SELECT `b_id`, `b_title`, `img_link`, `author` FROM `blog_data`ORDER BY 'views' ASC;";
  $result = $conn->query($query);

  $i = 0;
  $data = array();
  while($row = $result->fetch_assoc()) {
      $data[$i] = $row ;
      $i++;
    }
   ?>

  <meta charset="utf-8">
  <title>MeraBlogSite</title>
  <!-- <meta http-equiv="refresh" content="2"> -->
  <link rel="stylesheet" href="css/bulma.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <style media="screen">
  *{
    font-family: -apple-system,BlinkMacSystemFont, "Segoe UI";
  }
  body{
    background: url('img/bg.png');
  }
  .navbar-item{
    padding: 3px auto;
  }
  .is-shadowed{
    box-shadow: 0px 5px 10px rgba(150,150,150,.3);
  }
  #sidebar{
    width: 300px;
    height: 100%;
  }

  .container .tabs ul {
    background:whitesmoke
  }
  .tabs::-webkit-scrollbar {
    display: none;
  }
</style>
</head>
<body>
  <nav class="navbar is-shadowed is-fixed-top is-primary">
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
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            <i class="fas fa-sign-in-alt"></i>
          </a>
          <div class="navbar-dropdown is-boxed" style="width:250px;padding:10px;">
              <form  action="authenticate.php" method="get">
                <div class="field">
                  <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" name="email" placeholder="Email">
                    <span class="icon is-small is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fas fa-check"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="password" name="pass" placeholder="Password">
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <input type="submit" class="button is-primary" name="login" value="Login">
                  </p>
                </div>
              </form>
          </div>
        </div>
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
  <br>
  <br>
  <br>
  <div class="container-hd is-fluid">
    <div class="tabs is-centered ">
      <ul>
        <li class="is-active">
          <a href="">
            <span class="icon is-small"><i class="fas fa-home"></i></span>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="sports.php">
            <span class="icon is-small"><i class="fas fa-basketball-ball"></i></span>
            <span>Sports</span>
          </a>
        </li>
        <li>
          <a href="health-and-fitness.php">
            <span class="icon is-small"><i class="fas fa-stethoscope"></i></span>
            <span>Health & Fitness</span>
          </a>
        </li>
        <li>
          <a href="science-and-technology.php">
            <span class="icon is-small"><i class="fas fa-flask"></i></span>
            <span>Science & Technology</span>
          </a>
        </li>
      </ul>
    </div>

  </div>
  <br>
  <br>
  <div class="container" >
    <div class="title">
      Trending now
    </div>
    <div class="tile is-ancestor ">

      <div class="tile is-vertical is-8">
        <div class="tile is-parent">
          <a href="<?php echo "blog.php?id=".$data[0]['b_id'] ?>" class="tile is-child notification is-white">
            <figure class="image ">
              <img src="<?php echo $data[0]['img_link'] ; ?>">
            </figure>
            <span class="title"><?php echo $data[0]['b_title'];?></span>
            <br>
            <span class="subtitle" style="color:#999;"><?php echo "@".$data[0]['author'];?></span>
            <div class="content">
              <!-- Content -->
            </div>
          </a>

        </div>
        <div class="tile">
          <div class="tile is-parent ">
            <a href="<?php echo "blog.php?id=".$data[1]['b_id'] ?>" class="tile is-child  notification is-white">
              <figure class="image ">
                <img src="<?php echo $data[1]['img_link'];  ?>">
              </figure>
              <span class="title"><?php echo $data[1]['b_title']; ?></span>
              <br>
            <span class="subtitle" style="color:#999;"><?php echo "@".$data[1]['author'];?></span>

            </a>
          </div>
          <div class="tile is-parent">
            <a href="<?php echo "blog.php?id=".$data[2]['b_id'] ?>" class="tile is-child  notification is-white">
              <figure class="image ">
                <img src="<?php echo $data[2]['img_link'];  ?>">
              </figure>
              <span class="title"><?php echo $data[2]['b_title']; ?></span>
              <br>
            <span class="subtitle" style="color:#999;"><?php echo "@".$data[2]['author'];?></span>

            </a>
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile is-parent is-vertical">
          <a href="<?php echo "blog.php?id=".$data[3]['b_id'] ?>" class="tile is-child  notification is-white">
            <figure class="image ">
              <img src="<?php echo $data[3]['img_link'];  ?>">
            </figure>
            <span class="title"><?php echo $data[3]['b_title']; ?></span>
            <br>
          <span class="subtitle" style="color:#999;"><?php echo "@".$data[3]['author'];?></span>

          </a>
          <a href="<?php echo "blog.php?id=".$data[4]['b_id'] ?>" class="tile is-child  notification is-white">
            <figure class="image ">
              <img src="<?php echo $data[4]['img_link'];  ?>">
            </figure>
            <span class="title"><?php echo $data[4]['b_title']; ?></span>
            <br>
          <span class="subtitle" style="color:#999;"><?php echo "@".$data[4]['author'];?></span>

          </a>
          <a href="<?php echo "blog.php?id=".$data[5]['b_id'] ?>" class="tile is-child  notification is-white">
            <figure class="image ">
              <img src="<?php echo $data[5]['img_link'];  ?>">
            </figure>
            <span class="title"><?php echo $data[5]['b_title']; ?></span>
            <br>
          <span class="subtitle" style="color:#999;"><?php echo "@".$data[5]['author'];?></span>

          </a>
        </div>
      </div>
    </div>
  </div>
<hr>
<div class="container">
  <div class="hero is-white is-shadowed">
    <div class="hero-body ">
      <div class="columns">
      <div class="column is-two-thirds">

      <h1 class="title is-1 has-text-primary">
        Want to be blogger?
      </h1>
      <br>
      <h1 class="subtitle is-4">
          Feel free to create a account on our page and write blogs of your choice
      </h1>
      <a href="author_reg.php" class="button is-primary is-medium">CREATE A ACCOUNT</a>
    </div>
    <div class="column is-hidden-mobile">
      <figure>
        <img src="img/recruit.png" alt="">
      </figure>
    </div>
  </div>
    </div>
  </div>
</div>
<br>
<div class="footer has-text-light" style="background:#00d1b2;">
<div class="container-hd has-text-centered  ">
  <p class="subtitle is-5 has-text-light"> This is  a basic blog-site. it is made to be submitted as DBMS mini project.</p>
  <div class="title is-5">
    <br>
    <strong>
      THE TEAM
    </strong>
    <p>
      Jasmin Sethi<br>
      Md. Sabir<br>
      Rajat Kumar<br>
      Avinash Kumar
    </p>
  </div>
</div>
</div>


<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
      // Add a click event on each of them
      $navbarBurgers.forEach(function ($el) {
        $el.addEventListener('click', function () {
          // Get the target from the "data-target" attribute
          var target = $el.dataset.target;
          var $target = document.getElementById(target);
          // Toggle the class on both the "navbar-burger" and the "navbar-menu"
          $el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });
    }

  });
</script>
</body>
</html>
