<?php
session_start();
if(!isset($_SESSION['login_user']))
{
  
  header("location:/moodle/login.php");
  
}
if(!isset($_SESSION['tid']))
{
  
  header("location:whattheques.php");
  
}
include('quesdb.php');
if($_SESSION['qno']>$_SESSION['count'])
{
    ?><script>window.alert("test added successfully");</script><?php
    unset($_SESSION['tid']);
    header("location:viewtest.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
    <li class="nav-item">
        <a class="nav-link "href="home.php">Home</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="student_reg.php">Student Registration</a>
      </li>
     

      <li class="nav-item">
        <a class="nav-link active"href="whattheques.php">Add Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="viewtest.php">View Test</a>
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
  <h1><center>ADD QUESTIONS</center></h1>
                                       
  <div class="container">
  <h2>Question<?php echo $_SESSION['qno']?></h2>
  <!--<a href="#demo" class="btn btn-primary" data-toggle="collapse">MCQ</a>
  <div id="demo" class="collapse">-->
   
   <form method="POST" action="questions1.php" autocomplete="off">
    <div class="form-group">
    <br>
    <input class="form-control input-lg" id="inputlg" type="text" id="question" name="question" placeholder="add a question"><br>
                
                <label for="option1">OPTIONS:</label><br>
                
                <input class="form-control input-lg" id="inputlg" type="text" id="option1" name="ot1" placeholder="option 1" required><br>
                <input class="form-control input-lg" id="inputlg" type="text" id="option2" name="ot2" placeholder="option 2" required><br>
                <input class="form-control input-lg" id="inputlg" type="text" id="option3" name="ot3" placeholder="option 3"><br>
                <input class="form-control input-lg" id="inputlg" type="text" id="option4" name="ot4" placeholder="option 4"><br>



              <br>

            
             
                
                <label for="sel11">CORRECT ANSWER:</label>
                
              <input type="text" id="sel11" class="form-control"  name="cot" placeholder="enter  correct option" required>
              
                <br>
                <br>
               
	
 
            
              
                
                <label for="sel1">COURSE OUTCOME:</label>
                
              <input type="number" id="sel1" id="co" name="co" class="form-control" placeholder="co" required>
                <br>
                <br>
                <div id="frame">
                
            </div>                
            </div>


<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Next">

</form>
<br>
<br>

</div>
</div><br><br>


</div>
 


</div>


</body>
<script>
  var btn=document.getElementById("submit");
  var qno ="<?php echo $_SESSION['qno']?>";
  var count="<?php echo $_SESSION['count']?>";
  if(qno==count)
  {
   submit.setAttribute("value", "Finish");
  }
  </script>
</html>


