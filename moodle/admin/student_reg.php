



<?php
session_start();
if(!isset($_SESSION['login_user']))
{
  
    header("location:/moodle/login.php");
  
}

include('sturegdb.php');
?>
<!DOCTYPE html>
<html>
<head>


<script>
function validateForm() {
    var x = document.forms["studentreg"]["studentname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}

function validateForm() {
    var x = document.forms["studentreg"]["studentregno"].value;
    if (x == "") {
        alert("Register number must be filled out");
        return false;
    }
}


function validateForm1() {
    var x = document.forms["studentreg"]["password"].value;
    if (x == "") {
        alert("Password must be filled out");
        return false;
    }
}


</script>



    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
<!--<link rel="stylesheet" href="srstyle.css">-->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
    <li class="nav-item">
        <a class="nav-link "href="home.php">Home</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link active" href="student_reg.php">Student Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="manage_students.php">Manage Student</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"href="staff_registration.php">Staff Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="manage_staffs.php">Manage Staff</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="viewtest.php">View Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="remove.php">Remove student</a>
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

    
    <div class="content-wrapper">
        <div class="container" id="box1">
    <div class="row" >
        <div class="col-md-3"></div>
          <div class="col-md-6">
              
              <br>

              <div class="panel-body">
                <form name="studentreg" method="post">
<div class="form-group">
<label for="studentname">Student Name  </label>
<input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
</div>

<div class="form-group">
<label for="studentregno">Student Reg No   </label>
<input type="text" class="form-control" id="studentregno" name="studentregno" onBlur="userAvailability()" placeholder="Student Reg no" required />
<span id="user-availability-status1" style="font-size:12px;">
</div>

<div class="form-group">
    <label for="dept">Department</label>
    <select class="form-control" id="dept" name="dept">
      <option value="CSE">CSE</option>
      <option value="ECE">ECE</option>
      <option value="BME">BME</option>
      <option value="EEE">EEE</option>
      <option value="CIVIL">CIVIL</option>
      <option value="IT">IT</option>
      <option value="AERO">AERO</option>
      <option value="EIE">EIE</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
<div class="form-group">
<label for="section">Section</label>
<input type="text" class="form-control" id="section" name="section"  placeholder="Section" required />
</div>
<div class="form-group">
<label for="batch">Batch(in year)</label>
<input type="text" class="form-control" id="batch" name="batch"  placeholder="Batch" required />
</div>

<div class="form-group">
<label for="password">Password  </label>
<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
</div>   

<button type="submit" name="submit" id="submit" class="btn btn-success" style="margin:auto;display:block;">Submit</button>
<br>
  <span class="text-danger"><?php if(isset($error)) 
  echo $error;?>
 </span>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>