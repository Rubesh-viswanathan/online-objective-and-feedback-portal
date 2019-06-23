<?php
session_start();
if(!isset($_SESSION['login_user']))
{
  
    header("location:/moodle/login.php");
  
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
        <a class="nav-link active"href="home.php">Home</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="student_reg.php">Student Registration</a>
      </li>
     

      <li class="nav-item">
        <a class="nav-link"href="whattheques.php">Add Test</a>
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
        
    </li>

</nav>
    
    <div class="container">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th><h3>Student Name</h3> </th>
                        <th><h3>Register Number</h3> </th>
                       <th><h3>Registered Date</h3></th>
                       <?php
                        $row;
                        $sql='select studentName,StudentRegno,timestamp from students';
                        $result=mysqli_query($conn,$sql);
                        while($row = $result->fetch_assoc()){
                     ?></tr>
                    
                    <tr>
                     <td>
                     
                         <?php echo htmlentities($row['studentName']);?></td>
                                            <td><?php echo htmlentities($row['StudentRegno']);?></td>
                                            <td><?php echo htmlentities($row['timestamp']);?></td>
                                            <td align="right">   <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                           <button class="btn btn-danger" onclick="del()"><i class="fa fa-edit " ></i> Delete</button></td>
                     
                     
                                           



                        </tr><?php }?> 
                </thead>
                <?php
include('connect.php');
function del()
{
    $id=$row['StudentRegno'];
    $sql = "DELETE FROM MyGuests WHERE StudentRegno=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}

                ?>
                
                        
</body>
</html>