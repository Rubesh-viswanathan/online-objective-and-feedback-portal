<?php

session_start();

if(!isset($_SESSION['login_user']))

{

  

  header("location:/login.php");

  

}



include('connect.php');





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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body>



        <div>

                <nav class="navbar navbar-inverse" id="nav">

                <div class="container-fluid">

                    <div class="navbar-header">

                      <a class="navbar-brand" href="home.php">Moodle</a>

                    </div>

                    <ul class="nav navbar-nav">

                    <li class="active"><a href="home.php">Home</a></li>

                      <li class="active"><a href="questions1.php">Questions</a></li>

                      <li class="active"><a href="student_reg.php">Student Registration</a></li>

                      <li class="active"><a href="manage_students.php">Manage Students</a></li>

                      <li class="active"><a href="staff_registration.php">Staff Registration</a></li>

                      <li class="active"><a href="manage_staffs.php">Manage Staffs</a></li>

                      <li class="active"><a href="test.php">Test</a></li>

                      </ul>

                      <ul class="nav navbar-nav navbar-right">

                     <li><a href="#"><?php echo $_SESSION['login_user'];?></a></li>

      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>

                   

                </div>

              </nav>

          </div>  

    

    <div class="panel-body">

        <div class="table-responsive table-bordered">

            <table class="table">

                <thead>

                    <tr>

                        

                        <th>QUESTION</th>

                        <th>CO</th>

                       <th>MARK</th>

                       <th>OPTION1</th>

                       <th>OPTION2</th>

                       <th>OPTION3</th>

                       <th>OPTION4</th>

                       <th>OPT1-MARK</th>

                       <th>OPT2-MARK</th>

                       <th>OPT3-MARK</th>

                       <th>OPT4-MARK</th>

                       <?php

                        $row;

                        $sql='select question,co,mark,ot1,ot2,ot3,ot4,m1,m2,m3,m4 from qt';

                        $result=mysqli_query($conn,$sql);

                        while($row = $result->fetch_assoc()){

                     ?></tr>

                    <tr>

                                            <td><?php echo htmlentities($row['question']);?></td>

                                            <td><?php echo htmlentities($row['co']);?></td>

                                            <td><?php echo htmlentities($row['mark']);?></td>

                                            <td><?php echo htmlentities($row['ot1']);?></td>

                                            <td><?php echo htmlentities($row['ot2']);?></td>

                                            <td><?php echo htmlentities($row['ot3']);?></td>

                                            <td><?php echo htmlentities($row['ot4']);?></td>

                                            <td><?php echo htmlentities($row['m1']);?></td>

                                            <td><?php echo htmlentities($row['m2']);?></td>

                                            <td><?php echo htmlentities($row['m3']);?></td>

                                            <td><?php echo htmlentities($row['m4']);?></td>

                        </tr><?php }?>

                </thead>



</body>

</html>