<?php
session_start();
include('connect.php');
if(!isset($_SESSION['login_user']))
{
  
  header("location:/feedback/login.php");
  
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
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="navbar-nav-scroll">

    <ul class="navbar-nav bd-navbar-nav flex-row">

    <li class="nav-item">

        <a class="nav-link active "href="viewfeedback.php">Feedback</a>

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
    <div class="jumbotron">
    <p>Sri Ramakrishna</p>
    </div>
    <br>
    <div class="container">
    <?php 
     $sql="select staffid,count(one),sum(one),sum(two),sum(three),sum(four),sum(five),sum(six),sum(seven),sum(eight),sum(nine),sum(ten),sum(eleven),sum(total) from feedbackres where feedbackid = ".$_SESSION['fid']." and staffid =" .$_SESSION['stfid']." and scode = '".$_SESSION['scode']."'" ;
     $result=mysqli_query($conn,$sql);
     while($row = $result->fetch_assoc()){
        ?><h1><?php  $sql1="select staffname from staffs where staffid = ".$row['staffid'] ;
        $result1=mysqli_query($conn,$sql1);
        $row1 = $result1->fetch_assoc();
        echo $row1['staffname']; 
        ?>
        </h1>
        <table class="table table-bordered">
        <tr class="text-center">
        <th>Category</th><th>Score</th>
        <tr><td>Puntuality</td><td><?php echo round($row['sum(one)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Regularity</td> <td><?php echo round($row['sum(two)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Personality</td> <td><?php echo round($row['sum(three)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Pace of covering syllabus</td><td><?php echo round($row['sum(four)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Clarity in Expressions</td><td><?php echo round($row['sum(five)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Encourage to raise doubts and ability to clarify</td><td><?php echo round($row['sum(six)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Ability to maintain discipline</td><td><?php echo round($row['sum(seven)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Provision of feedback on learning deficiencies</td><td><?php echo round($row['sum(eight)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Ability to sustain students attention and Interest</td><td><?php echo round($row['sum(nine)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Providing sufficient course material</td><td><?php echo round($row['sum(ten)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Citation, Examples, Illustraions etc</td><td><?php echo round($row['sum(eleven)']/$row['count(one)'],2); ?> </td></tr>
        <tr><td>Total</td><td><?php echo round($row['sum(total)']/($row['count(one)']*11),2)  ; ?> </td></tr>
       </table>
     <?php } ?>
        </div>
        </body3>
        </html>