<html>
<head>
<?php
  $servername = "localhost";
  $username = "king";
  $password = "35@Thunder48";
  $db = "blog";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$db);
 if(isset($_POST['submit'])){

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
  <div class="container">
    <div class="columns">
      <div class="column is-three-fifths is-offset-one-fifth hero is-white ">


<form method="post" action="upload.php" enctype="multipart/form-data">


        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" type="text" name="author" placeholder="Enter Name" required>
          </div>
        </div>



        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-danger" type="email" name="email" placeholder="Enter Email" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
          </div>
          <p class="help is-danger">This email is invalid</p>
        </div>
        <div class="field">
              <div class="control">
                  <input type="file" id="file" name="file" class="button">
              </div>

        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input class="input" type="password" name="pass" placeholder="Password" required>
          </div>
        </div>



        <div class="field is-grouped">
          <div class="control">
            <input type="submit" class="button is-link" name="submit">
          </div>
          <div class="control">
            <a href="../" class="button">back</a>
          </div>
        </div>
      </div>
    </div>


</form>




  </div>
  <br>

<div class="footer has-text-light" style="background:#00d1b2;">
<div class="container-hd has-text-centered  ">
  <p class="subtitle is-5 has-text-light"> This is <strong>footer</strong> </p>
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
