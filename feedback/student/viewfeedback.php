<?php
session_start();
include('connect.php');
if(!isset($_SESSION['login_user']))
{
  
  header("location:/feedback/login.php");
  
}
if(isset($_POST['start']))
{
  $_SESSION['stfid']=$_POST['staff'];
  $_SESSION['fid']=$_POST['id'] ;
  $_SESSION['scode']=$_POST['scode'];
  $_SESSION['sname']=$_POST['sname'];
  header("location:feednew.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage_students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
    <li class="nav-item">
        <a class="nav-link "href="viewfeedback.php">Feedback</a>
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
        
    </li>

</nav>
    <br>
    <div class="container">
   
        
                       <?php
                         $sql1='select department,batch from students where studentregno='.$_SESSION['rno'];
                         $result1=mysqli_query($conn,$sql1);
                         $row1 = $result1->fetch_assoc();
                         $row;
                         $sql='select * from feedback where  department = "'.$row1['department'].'" and batch = "'.$row1['batch'].'"';
                         $result=mysqli_query($conn,$sql);
                         while($row = $result->fetch_assoc()){
                     ?>
                     <div class="card text-center" style="width: 50rem;margin:auto;display:block;box-shadow: 10px 10px 15px grey">
  <div class="card-body ">
    <h5 class="card-title"><?php echo $row['sname']?></h5>
  
    <form method="post" >
    <div class="form-group">
    
    <select class="form-control" id="staff" name="staff">
       <option value="<?php echo $row['stf1']?>"><?php $sql2='select * from staffs where staffid='.$row['stf1'];
                                                      $result2=mysqli_query($conn,$sql2);
                                                      $row2 = $result2->fetch_assoc();
                                                      echo $row2['staffname'];
                                                      ?></option>
      <option value="<?php echo $row['stf2']?>"><?php $sql2='select * from staffs where staffid='.$row['stf2'];
                                                      $result2=mysqli_query($conn,$sql2);
                                                      $row2 = $result2->fetch_assoc();
                                                      echo $row2['staffname'];
                                                      ?></option>
      <option value="<?php echo $row['stf3']?>"><?php $sql2='select * from staffs where staffid='.$row['stf3'];
                                                      $result2=mysqli_query($conn,$sql2);
                                                      $row2 = $result2->fetch_assoc();
                                                      echo $row2['staffname'];
                                                      ?></option>
    </select>
  </div>
    <input type="text" name="id" value="<?php echo $row['feedbackid']?>" style="display:none">
    <input type="text" name="scode" value="<?php echo $row['scode']?>" style="display:none">
    <input type="text" name="sname" value="<?php echo $row['sname']?>" style="display:none">
    <button type="submit" class="btn btn-primary" name="start">Start Feedback</button>
    </form>
  </div>
</div>
                   
<br>                  
                     <?php }?>
                
                        
                        </div>                      


</body>
</html>