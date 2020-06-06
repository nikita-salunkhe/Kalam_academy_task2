<?php
session_start();
$con=mysqli_connect('localhost','root','','kalam_academy');
// for registering users
if(isset($_POST['register']))
{
  $username=$_POST['username'];
  $password= $_POST['password'];
  $_SESSION['username']=$username;
  $pass=md5($password.$username);
  $query=$con->prepare("SELECT * FROM `record` WHERE `username`=?");
  $query->bind_param("s",$username);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
  	if($row==1)
    {
  	   echo '<script>alert("username already exists try with another username")</script>';
     }
    else {
      $query1=$con->prepare("INSERT INTO `record`(`username`, `password`) VALUES (?,?)");
      $query1->bind_param("ss",$username, $pass);
      $query1->execute();
      $run1= $query->get_result();
      //echo '<script>alert("registered  ")</script>';
      header("location:post.php?profile: name='$username'");
    }
}
// for login`
if(isset($_POST['Login']))
{
  $username=$_POST['username'];
	$password= $_POST['password'];
  $_SESSION['username']=$username;
  $pass=md5($password.$username);
  $query=$con->prepare("SELECT * FROM `record` WHERE `username` = ?");
  $query->bind_param("s",$username);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass){
	    header("location:post.php?profile: name='$username'");
     }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
        }
     }
  else{
    echo '<script>alert("you have not yet Registered")</script>';
     }
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <style>
  body {
    background-image: url(index.jpg);
    background-size: cover;
    background-position: center;
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a  class="photo" class="navbar-brand" href="#">
      <img src="logo.jpg" height="50" width="70" alt="logo">
      </a>
      <h5 style="color:white;"Website name</h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
  </div>
</nav>

  <main>
<!-- login -->
<div class="modal-dialog text-center">
  <div class="main-section">
    <br>
    <br>
    <br>
    <br>
    <div class="modal-content">
        <div class="modal-body">
      <div class="col-12">
        <h3>Login/ Sign Up</h3>
      </div>
      <form action="#" method="post" name="login" class="needs-validation" novalidate>
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control" placeholder="username" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="password" id="pwd" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
       </div>
       <div class= "row">
         <div class ="col-1"></div>
         <div class ="col-5">
           <button type="submit" name="Login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</button>
         </div>
         <div class ="col-5">
          <button type="submit" name="register" class="btn btn-primary"> Register</button>
        </div>
        <div class ="col-1"></div>
      </div>
     </form>
      </div>
    </div>
  </div>
</div>
<!-- VALIDATION FORM-->
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>
