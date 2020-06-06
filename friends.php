<?php
session_start();
$con = mysqli_connect('localhost','root','','kalam_academy');
$username=$_SESSION['username'];

//selecting all registered members
$query=$con->prepare("SELECT * FROM `record` WHERE `username` !=?");
$query->bind_param("s",$username);
$query->execute();
$run= $query->get_result();

// selecting friends of user
$query1=$con->prepare("SELECT * FROM `friends` WHERE `username`=?");
$query1->bind_param("s",$username);
$query1->execute();
$run1= $query1->get_result();

// selecting the friend request that user has
$query2=$con->prepare("SELECT * FROM `friend_request` WHERE `username`=?");
$query2->bind_param("s",$username);
$query2->execute();
$run2= $query2->get_result();


// inserting friend request send by user in database
if(isset($_GET['follow']))
{
  $follow= $_GET['follow'];
  $query3=$con->prepare("SELECT * FROM `friend_request` WHERE `username`=? AND `frnd_rqst` =?");
  $query3->bind_param("ss",$follow, $username);
  $query3->execute();
  $run3= $query3->get_result();
  $row3=$run3->num_rows;
  if($row3 == 1){}
    else{
  $query4=$con->prepare("INSERT INTO `friend_request`(`username`, `frnd_rqst`) VALUES (?,?)");
  $query4->bind_param("ss",$follow, $username);
  $query4->execute();
  header("refresh:0.5; url=friends.php");
   }
}


// if user confirms the request person will be saved in his friends table
// and deleted from friend_request table
// it will be two sided conncetion
if(isset($_GET['accept']))
{
  $query5=$con->prepare("SELECT * FROM `friends` WHERE `username`=? AND `friends` =?");
  $query5->bind_param("ss",$username, $accept);
  $query5->execute();
  $run5= $query5->get_result();
  $row5=$run5->num_rows;
  if($row5 == 1){}
    else{
  $accept= $_GET['accept'];
  $query6=$con->prepare("INSERT INTO `friends`(`username`, `friends`) VALUES (?,?)");
  $query6->bind_param("ss",$username, $accept);
  $query6->execute();
  $query7=$con->prepare("DELETE FROM `friend_request` WHERE `username`= ? AND `frnd_rqst`= ?");
  $query7->bind_param("ss",$username, $accept);
  $query7->execute();
  header("refresh:0.5; url=friends.php");
}

 $query8=$con->prepare("SELECT * FROM `friends` WHERE `username`=? AND `friends` =?");
 $query8->bind_param("ss",$accept, $username);
 $query8->execute();
 $run8= $query8->get_result();
 $row8=$run8->num_rows;
 if($row8 == 1){}
  else{
 $accept= $_GET['accept'];
 $query9=$con->prepare("INSERT INTO `friends`(`username`, `friends`) VALUES (?,?)");
 $query9->bind_param("ss",$accept, $username);
 $query9->execute();
 header("refresh:0.5; url=friends.php");
 }
}


if(isset($_GET['delete']))
{
  $delete= $_GET['delete'];
  $query0=$con->prepare("DELETE FROM `friend_request` WHERE `username`= ? AND `frnd_rqst`= ?");
  $query0->bind_param("ss",$username, $delete);
  $query0->execute();
  header("refresh:0.5; url=friends.php");
}
if(isset($_POST['logout']))
{
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Friends</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
body {
  background-image: url(friends.jpg);
  background-size: cover;
  background-position: center;
}
</style>
</head>
<body>
  <header>
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
      <input class="form-control mr-sm-2 btn btn-outline-light my-2 my-sm-0 btn btn-primary" type="submit" name="friends" value="Friends">
      <button class="btn btn-outline-light my-2 my-sm-0 btn btn-secondary" name="logout" type="submit">Logout</button>
    </form>
  </div>
</nav>
  </header>
  <main>
    <div class = "row">
       <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
         <br>
        <form action="#" method="post" name="login">
          <table class="table table-borderless ">
            <thead>
               <tr><th><h4>Friend requests<h4><th></tr>
            </thead>
            <tbody>
              <?php
              while($row2=mysqli_fetch_assoc($run2)){
                ?>
               <tr>
                  <th><label><?php echo $row2['frnd_rqst']; ?> </label></th>
                  <th><a href="?accept=<?php echo $row2['frnd_rqst']; ?>" class="btn btn-success">Yes</a></th>
                  <th><a href="?delete=<?php echo $row2['frnd_rqst']; ?>" class="btn btn-secondary">No</a></th>
                </tr>
              <?php
               }
               ?>
            </tbody>
          </table>
      </form>
      </div>
       <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
       <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
         <br>
      <form action="#" method="post" name="login">
       <table class="table table-striped ">
         <thead>
          <tr><th scope="col"><h4>Friends<h4></th></tr>
         </thead>
         <tbody>
        <?php
          while($row1=mysqli_fetch_assoc($run1)){
        ?>
          <tr><th><label><?php echo $row1['friends']; ?> </label></th> </tr>
        <?php
          }
        ?>
       </tbody>
      </table>
    </form>
   </div>
    <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
    <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
      <br>
     <form action="#" method="post" name="login">
     <table class="table table-borderless ">
      <thead>
         <tr> <th scope="col"><h4>All users</h4></th></tr>
      </thead>
      <tbody>
          <?php
            while($row=mysqli_fetch_assoc($run)){
          ?>
        <tr>
           <th><label><?php echo $row['username']; ?> </label></th>
           <th><a href="?follow=<?php echo $row['username']; ?>" class="btn btn-info">Follow</a></th>
       </tr>
     <?php
      }
     ?>
    </tbody>
   </table>
    </form>
   </div>
  </div>
  </main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>
