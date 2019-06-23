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

    <title>Add test</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" >

    <script src="main.js"></script>

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

    

          <header style="text-align: center;">

            <br><h1>Test details</h1>

        </header>

        <br>

        <div class="container">

            <form method="post" action="">

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

                    <label for="batch">Batch:</label>

                    <input class="form-control" name="batch" placeholder="Batch">

                </div>

                <div class="form-group">

                    <label>Subject name:</label>

                    <input class="form-control" name="sname" placeholder="Enter subject name">

                </div>

                <div class="form-group">

                    <label for="scode">Subject code:</label>

                    <input class="form-control" name="scode" placeholder="Subject code">

                </div>

                <div class="form-group">

                    <label for="qsize">Number of questions:</label>

                    <input class="form-control" name="qsize" placeholder="Number of questions">

                </div>

                <div class="form-group">

                    <label for="time">Time:</label>

                    <input class="form-control" name="time" placeholder="Time limit in mins">

                </div>

                

                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>     

               </form>

               <?php

                if(isset($_POST['submit']))

                {

                    $query="select max(tid) from addtest";

                    $result=mysqli_query($conn,$query);

                    $tid=$result->fetch_assoc();

                    $id=$tid['max(tid)']+1;

                $sname = $_POST['sname'];

                $scode = $_POST['scode'];

                $noques = $_POST['qsize'];

                $dept = $_POST['dept'];

                $batch = $_POST['batch'];

                $time = $_POST['time'];

                $hostedby = $_SESSION['login_user'];

                $_SESSION['count'] = $noques;

                $_SESSION['qno']=1;

                $_SESSION['tid']=$id;

                echo($_SESSION['count']);         

                $SQL = "INSERT INTO addtest (sname, scode, noofques,time,hostedby,tid,department,batch) VALUES ('$sname', '$scode', '$noques','$time','$hostedby','$id','$dept','$batch')";

                $result = mysqli_query($conn,$SQL);

                //header("location:questions1.php");

                ?>

                <script> location.replace("questions1.php"); </script>

                <?php

                }

                ?>

</div>

</body>

</html>

               

               

               