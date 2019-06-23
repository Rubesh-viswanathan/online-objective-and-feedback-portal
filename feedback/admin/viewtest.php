<?php

session_start();

include('connect.php');

if(!isset($_SESSION['login_user']))

{

  

  header("location:/login.php");

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

        <a class="nav-link "href="home.php">Home</a>

      </li>

     

      <li class="nav-item">

        <a class="nav-link " href="student_reg.php">Student Registration</a>

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

        <a class="nav-link active"href="viewtest.php">View Test</a>

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



    <br>

    <div class="container">

    <div class="card-group">

        

                       <?php

                        $row;

                        $sql='select * from addtest';

                        $result=mysqli_query($conn,$sql);

                        while($row = $result->fetch_assoc()){

                     ?>

                     <div class="card text-center" style="width: 18rem;">

  <div class="card-body ">

    <h5 class="card-title"><?php echo $row['sname']?></h5>

    

    <p class="card-text">No of questions:<?php echo $row['noofques']?></p>

    <p class="card-text">Test Id:<?php echo $row['tid']?></p>

    <p class="card-text">Hosted by :<?php echo $row['hostedby']?></p>

    <?php

    if($row['isLive']==0)

        {?>

        <p class="text-muted">Not hosted</P>

        <?php

        }

        else

        {

        ?>

        <p class="text-success">Hosted</P>

        <?php

        }

        ?>

  </div>

</div>

                   

                       

                     <?php }?>

                

                        </div>

                        </div>                      

</body>

</html>