<?php
session_start();
include('connect.php');
if(!isset($_SESSION['login_user']))
{
  
  header("location:/moodle/login.php");
  
}
if(isset($_POST['submit']))
{
    $old=$_POST['opassword'];
    $pass1=$_POST['password1'];
    $pass2=$_POST['password2'];
    $check='select * from students where StudentRegno='.$_SESSION['rno'];
    $row=mysqli_query($conn,$check);
    $result=$row->fetch_assoc();
    if($result['password']==$old)
    {
        if($pass1==$pass2)
        {
            $up='UPDATE students SET password ="'.$pass1.'" WHERE studentregno ='.$_SESSION['rno'];
            $query2=$conn->query($up) or die($conn->error); 
            $up1='UPDATE login SET password ="'.$pass1.'" WHERE id ='.$_SESSION['rno'];
            $query3=$conn->query($up1) or die($conn->error); 
        } 
        else
        {
            ?>
                <script>window.alert("Passwords do not match");
                </script>    
            <?php
        }   
    }
    else
        {
            ?>
                <script>window.alert("Enter correct password");
                </script>    
            <?php
        } 
}
?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Moodle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="style.css">
    <script src="main.js"></script>
    
   
        <!--navabr potrukaen-->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
    <li class="nav-item">
        <a class="nav-link active"href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="viewteststud.php">View Test</a>
      </li>
    </ul>
  </div>

  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
  <li class="nav-item dropdown">
      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['login_user']?>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
        <a class="dropdown-item" href="logout.php">Logout</a>
        <a class="dropdown-item" href="changepass.php">Change Password</a>
    </li>

</nav>
    <div class="container">
 <form name="studentreg" method="post">
    <div class="form-group">
        <label for="opassword">Old Password  </label>
        <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Old password" required />
    </div> 
    <div class="form-group">
        <label for="password1">New Password  </label>
        <input type="password" class="form-control" id="password1" name="password1" placeholder="New password" required />
    </div> 
    <div class="form-group">
        <label for="password2">Confirm Password  </label>
        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm password" required />
    </div> 
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Change</button>
 </form>
  </div>      
</body>