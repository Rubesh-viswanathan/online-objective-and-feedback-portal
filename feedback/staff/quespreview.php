<?php
session_start();
if(!isset($_SESSION['login_user']))
{
  
    header("location:/moodle/login.php");
  
}
include('connect.php');
if(isset($_POST['post']))
{
    $up="UPDATE `addtest` SET `isLive` = '1' WHERE `addtest`.`tid` =".$_SESSION['tid'];
    $query2=$conn->query($up) or die($conn->error);
    ?><script>alert("Test posted sucessfully");</script><?php
    unset($_SESSION['tid']);
    header("location:viewtest.php");
}
if(isset($_POST['remove']))
{
    $up="UPDATE `addtest` SET `isLive` = '0' WHERE `addtest`.`tid` =".$_SESSION['tid'];
    $query2=$conn->query($up) or die($conn->error);
    ?><script>alert("Test removed sucessfully");</script><?php
    unset($_SESSION['tid']);
    header("location:viewtest.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Questions preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
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
        <a class="nav-link"href="whattheques.php">Add Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active"href="viewtest.php">View Test</a>
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
    
          <header style="text-align: center;">
            <h1>Questions preview</h1>
        </header>
        <br>
        <div class="container">
        <div class="column" >
            <?php
            $row;
            $sql='select question,ot1,ot2,ot3,ot4,cot,img from qt where tid='.$_SESSION['tid'];
            $result=mysqli_query($conn,$sql);
            $numb = 1;
            while($row = $result->fetch_assoc()){
            ?>   
            <div class="row-md-4">
                <div class="card" id="ques">
                    <div class="card-body">
                    <?php if($row['img'])
                    {?>
                    <div class="card-img-top" >
                        <?php 
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" class="card-img-top" style="height:600px;" />'; ?>
                    </div>
                    <?php    
                    
                }
                ?>
                        <p class="card-text">
                           <pre> <?php echo htmlentities($numb);
                            echo". ";
                            echo htmlentities( $row['question']);
                            ?></pre>
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo htmlentities($row['ot1']);?></li>
                            <li class="list-group-item"><?php echo htmlentities($row['ot2']);?></li>
                            <li class="list-group-item"><?php echo htmlentities($row['ot3']);?></li>
                            <li class="list-group-item"><?php echo htmlentities($row['ot4']);?></li>
                            <li class="list-group-item text-success"><?php echo htmlentities($row['cot']);?></li>
                        </ul>
                    </div>
                </div>
            </div> 
            <?php 
            $numb++;
            }?>       
        </div>
        <br>
        <br>
        <?php
        $query='select isLive from addtest where tid='.$_SESSION['tid'];
        $result1=mysqli_query($conn,$query);
        $isLive = $result1->fetch_assoc();
        if($isLive['isLive']==0)
        {?>
        <form method="post" >
        <input type="submit" name="post" class="btn btn-primary"  value="HOST">
        </form>
        <?php
        }
        else
        {
        ?>
        <form method="post" >
        <input type="submit" name="remove" class="btn btn-danger"  value="REMOVE">
        </form>
        <?php
        }
        ?>
        </div>
       
</body>
</html>