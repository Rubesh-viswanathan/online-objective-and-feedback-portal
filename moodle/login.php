<?php
session_start();
?>
<!DOCTYPE html>
<?php
include('index.php');

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet"  href="style.css">
    <!-- Bootstrap,js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <div class="bg">
        
    </div>
<div class="container">
<div class="jumbotron" id="jum"></div>    
<div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <div class="card-header text-center" id="card">
    Login Form
  </div>
        <form id="login" method="post" >
  <div class="form-group" >
    <label for="username">Register Number</label>
    <input type="username" class="form-control" id="username" aria-describedby="username" placeholder="regno" name="username" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit" style="margin:auto;display:block;">Submit</button>
  <br>
  <span class="text-danger"><?php if(isset($error)) 
  echo $error;
  if(isset($_SESSION['err']))
  {
      echo $_SESSION['err'];
  } ?></span>
</form>

        </div>
    </div>



</div>
<?php
$_SESSION['auser']="username";
?>
    
</body>
</html>