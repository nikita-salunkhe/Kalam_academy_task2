<?php
session_start();  // session
$con = mysqli_connect('localhost','root','','kalam_academy');
date_default_timezone_set("Asia/kolkata");
$timestamp= time();
$username=$_SESSION['username'];

// create an array where all your friends are stored
$yourfriends =array();
$query=$con->prepare("SELECT * FROM `friends` WHERE `username`=?");
$query->bind_param("s", $username);
$query->execute();
$run= $query->get_result();
    while($row=mysqli_fetch_assoc($run)){
      $yourfriends[] = $row['friends'];
    }

//print_r($yourfriends);
// selecting recent friend's post
$arrayfriends = join(" ','", $yourfriends);
$query1="SELECT * FROM post WHERE  username IN ('$arrayfriends') ORDER BY `timestamp` DESC LIMIT 20";
$run1=mysqli_query($con, $query1);


if(isset($_POST['friends']))
{
    header("location:friends.php?profile: name='$username'");
}

// updating post
if(isset($_POST['post']))
{
  $mypost= $_POST['mypost'];
  $query2=$con->prepare("INSERT INTO `post`(`username`, `mypost`, `timestamp`) VALUES (?,?,?)");
  $query2->bind_param("sss",$username, $mypost, $timestamp);
  $query2->execute();
  echo '<script>alert("You updated a new post")</script>';
    header("location:post.php");
}

if(isset($_POST['logout']))
{
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>post</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>

</style>
</head>
<body>
<header>
  <!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a  class="photo" class="navbar-brand" href="#">
      <img src="logo.jpg" height="50" width="70" alt="logo">
      </a>
      <h5 style="color:white;"><?php echo $username ?></h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
      <form action="#" method="post" name="login" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 btn btn-outline-light my-2 my-sm-0 btn btn-secondary" type="submit" name="friends" value="Friends">
      <button class="btn btn-outline-light my-2 my-sm-0 btn btn-secondary" name="logout" type="submit">Logout</button>
    </form>
  </div>
</nav>
</header>
    <main>
    <div class = "row">
        <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
        <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
            <br>
            <br>
            <br>
            <h4 style="color: black;" >New updates </h4>
            <?php
             while($row1=mysqli_fetch_assoc($run1)){
            ?>
              <?php echo "<h6 style='color: darkblue;'>". "Update from " .$row1['username']."</h6>";?>
              <?php echo "<h6 style='border: 0.07px solid gray; color:gray;' >".$row1['mypost']."</h6>"."<br>"."</br>";?>
            <?php
              }
            ?>
        </div>
      <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2"></div>
      <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
             <br>
             <br>
             <br>
             <h5>Post a new update </h4>
         <form action="#" method="post" name="login">
          <div class="form-group">
            <textarea  rows = "5" cols = "50" minlength = "2" maxlength= "200" name="mypost" placeholder =" Type your status update here" required></textarea>
          </div>
           <div class="form-group">
             <button type="submit" name="post" class="btn btn-primary"> post</button>
           </div>
         </form>
     </div>
     <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
  </div>
  </main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>
