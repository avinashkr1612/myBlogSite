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

session_start();
   $email = $_SESSION['_email'];
   $sql = "select * from author where author_email = '$email'";
   $result = mysqli_query($conn, $sql);
   $row = $result->fetch_assoc();
   if(isset($_POST['submit'])){
    $title = $_POST['b_title'];
    $auth = $_POST['author'];
    $vw = $_POST['views'];
    $ct = $_POST['b_content'];
    $category = $_POST['b_category'];
    $lnk = $_POST['img_link'];
    $query = "insert into `blog_data`(`b_id`, `b_title`, `b_content`, `author`, `views`, `category`,`img_link`) VALUES (null,'$title','$ct','$auth','$vw','$category','$lnk')";
    mysqli_query($conn, $query);
    header('Location: cms.php');
}


   ?>

  <meta charset="utf-8">
  <title></title>
  <!-- <meta http-equiv="refresh" content="3"> -->
  <link rel="stylesheet" href="css/bulma.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
  .is-shadowed{
    box-shadow: 5px 5px 10px rgba(150,150,150,.3);
  }

  .menu{
    width: 300px;
    height: 100%;
    min-width:200px;

  }

  .is-h-center {
    position:relative;left:50%;transform:translate(-50%,0);
  }
  .content-left{
    justify-content:left;
  }
  .space{
    padding-top:50px;
  }
  .is-circle{
    border-radius: 50%;
  }
  hr{
    width: 60%;
    margin-left: 20%;
    background: linear-gradient(to right, rgba(100, 100, 100, 0), rgba(100, 100, 100, 0.75), rgba(100, 100, 100, 0));
  }
  @media screen and (max-width:768px){
    #sidebar{
      display: none;
    }
  }
  .hidden{
    display: none;
  }
</style>
</head>
<body>
  <nav class="navbar is-shadowed  is-primary">
    <div class="navbar-brand">
      <div class="navbar-item">
        <h1 class="title is-5">
          MeraBlogSite
        </h1>
      </div>
      <div class="burger navbar-burger" id="togglenav" data-target="sidebar" >
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
  <div class="wrapper" style="display:flex;flex-flow:row;height:700px;">
    <aside id="sidebar" class="menu hero is-dark content-left has-text-centered space is-shadowed" style="flex:0 1 auto">
      <br>
      <figure class="image is-96x96  is-h-center is-clipped is-circle">
        <img src="<?php echo $row['img_url'] ; ?>" >
      </figure>
      <p><strong><?php echo $row['author_name']; ?></strong> </p>
      <p class="menu-label space">
        MANAGE YOUR BLOG
      </p>
      <ul class="menu-list ">
        <li><a class="is-active" id="createBlog">Create a Blog</a></li>
        <li><a  id="blogList">Your Blog List</a></li>
      </ul>
      <hr>
      <ul class="menu-list">
        <li><a href="index.php" id="Logout">Log Out</a></li>
      </ul>
    </aside>
    <div style="flex:1 1 auto;padding:10px;width:auto;">
      <div id="cb-content">

        <!--  create blog container starts here -->
        <h1 class="title"> Create a Blog</h1>



        <form action="blog_upload.php" method="POST" autocomplete="off"  enctype="multipart/form-data">
        <div class="field">
          <label class="label">Blog Title</label>
          <div class="control">
            <input class="input" type="text" name="b_title" value="" placeholder="Give a title ">
          </div>
        </div>
        <input type="hidden" name="author" value="<?php echo $row['author_name'] ; ?>">
        <input type="hidden" name="views" value="0">
        <div class="field">
          <label class="label">IMAGE</label>
          <div class="control">
            <input type="text" class="input" name="img_link" placeholder="Upload image link here"></textarea>
          </div>
        </div>
        <div class="field">
          <label class="label">Category</label>
          <div class="control">
            <div class="select">
              <select name="b_category">
                <option value="sports">Sports</option>
                <option value="h_and_f">Health & Fitness</option>
                <option value="s_and_t">Science & Technology</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Blog Content</label>
          <div class="control">
            <textarea class="textarea" name="b_content" placeholder="Textarea"></textarea>
          </div>
        </div>
        <div class="control">
          <input type="submit" name="submit" class="button is-primary" value="Submit">
        </div>
      </form>
      </div>
      <div class="hidden" id="blog-list">
        <?php

          $list_qry = "SELECT  `b_id`, `b_title`, `views` FROM `blog_data` WHERE author = '".$row['author_name']."'";
          $result = $conn->query($list_qry);
          ?>
          <div class="title is-3">
            Manage Your Blog
          </div>
        <table class="table">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Title</th>
              <th><i class="fas fa-eye"></i> views</th>
              <th><i class="fas fa-trash-alt"></i> Delete</th>
            </tr>
          </thead>
          <tbody>
<?php   $data = array();
        $i=0;
        while($row = $result->fetch_assoc()) {
        $data[$i] = $row ;
?>      <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $data[$i]['b_title'] ?></td>
              <td><?php echo $data[$i]['views'] ?></td>
              <td><a onclick="delalert()" href="delblog.php?id=<?php echo $data[$i]['b_id']; ?>"><i class="fas fa-trash-alt"></i> </a> </td>
            </tr>

<?php     $i++;
          }
 ?>
          </tbody>
        </table>

      </div>
      <div class="hidden" id="logout-pg">

      </div>




    </div>
  </div>
  <script>
  $(document).ready(function(){
    $("#createBlog").click(function(){
      removeActive();
      hideAll();
      console.log("test success")
      $("#createBlog").addClass("is-active");
      $("#cb-content").removeClass("hidden");
    });
    $("#blogList").click(function(){
      removeActive();
      hideAll();
      $("#blogList").addClass("is-active");
      $("#blog-list").removeClass("hidden");
    });
    $("#Profile").click(function(){
      removeActive();
      hideAll();
      $("#Profile").addClass("is-active");
      $("#chk-profile").removeClass("hidden");
    });
    $("#Settings").click(function(){
      removeActive();
      hideAll();
      $("#Settings").addClass("is-active");
      $("#settings-pg").removeClass("hidden");
    });
    $("#Logout").click(function(){
      removeActive();
      hideAll();
      $("#Logout").addClass("is-active");
      $("#logout-pg").removeClass("hidden");
    });

    function removeActive(){
      $("#createBlog").removeClass("is-active");
      $("#blogList").removeClass("is-active");
      $("#Logout").removeClass("is-active");
      $("#Profile").removeClass("is-active");
      $("#Settings").removeClass("is-active");

    }

    function hideAll(){
      $("#blog-list").addClass("hidden");
      $("#cb-content").addClass("hidden");
      $("#chk-profile").addClass("hidden");
      $("#logout-pg").addClass("hidden");
      $("#settings-pg").addClass("hidden");
    }
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#togglenav").click(function(){
    $("#sidebar").slideToggle("slow");
  });
});
</script>
<script>
function delalert() {
    alert("Success! The blog was succesfully deleated");
}
</script>

</body>
</html>
