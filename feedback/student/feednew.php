<?php

include('connect.php');

if(!isset($_SESSION))

{

  session_start();

 }

 if(!isset($_SESSION['login_user']))

{

  

  header("location:/login.php");

  

}
$val="select * from feedbackres where feedbackid = ".$_SESSION['fid']." and regno = ".$_SESSION['rno']. " and scode = '".$_SESSION['scode']."'" ;
$queryv=$conn->query($val);
$val_result = $queryv->fetch_assoc();
if($val_result['regno'])
{
    ?>
    <script>
    winodow.alert("Feedback already submitted for this subject");
    </script>
    <?php
    header("location:viewfeedback.php");  
}
if(isset($_POST['submit']))
{
   $mark=$_POST['1']+$_POST['2']+$_POST['3']+$_POST['4']+$_POST['5']+$_POST['6']+$_POST['7']+$_POST['8']+$_POST['9']+$_POST['10']+$_POST['11'];
   $up="INSERT INTO `feedbackres` (`feedbackid`, `staffid`, one,two,three,four,five,six,seven,eight,nine,ten,eleven, `total`, `scode`, `sname`,`regno`) VALUES (".$_SESSION['fid'].", ".$_SESSION['stfid'].", ".$_POST['1'].", ".$_POST['2'].", ".$_POST['3'].", ".$_POST['4'].", ".$_POST['5'].", ".$_POST['6'].", ".$_POST['7'].", ".$_POST['8'].", ".$_POST['9'].", ".$_POST['10'].", ".$_POST['11'].",".$mark." ,'".$_SESSION['scode']. "','".$_SESSION['sname']. "'," .$_SESSION['rno'].")";
        $query2=$conn->query($up) or die($conn->error); 
        header("location:viewfeedback.php");  
  
}



?>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Questions preview</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style.css">

</head>

<body>



       <nav class="navbar navbar-expand-lg navbar-light bg-light ">

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
        <a class="dropdown-item" href="changepass.php">Change Password</a>
        

    </li>



</nav>

<style>

</style>
<div class="container">
<form method="post">
                         
<label><b>Punctuality</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="1" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="1" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="1" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="1" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="1" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Regularity</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="2" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="2" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="2" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="2" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="2" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Personality</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="3" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="3" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="3" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="3" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="3" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Pace of covering syllabus</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="4" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="4" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="4" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="4" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="4" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Clarity in Expressions</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="5" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="5" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="5" value="3">Average</li>
                        <li class="list-group-item"><input type="radio" name="5" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="5" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Encourage to raise doubts and ability to clarify</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="6" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="6" value="2">Poor</li>
                        <li class="list-group-item"><input type="radio" name="6" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="6" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="6" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Ability to maintain discipline</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="7" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="7" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="7" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="7" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="7" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Provision of feedback on learning deficiencies</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="8" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="8" value="2">Poor</li>
                        <li class="list-group-item"><input type="radio" name="8" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="8" value="4">Good</li>
                        <li class="list-group-item"><input type="radio" name="8" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Ability to sustain students attention and Interest</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="9" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="9" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="9" value="3">Average</li>
                        <li class="list-group-item"><input type="radio" name="9" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="9" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Providing sufficient course material</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="10" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="10" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="10" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="10" value="4" >Good</li>
                        <li class="list-group-item"><input type="radio" name="10" value="5" >Very Good</li>

</ul>
<hr>
<label><b>Citation, Examples, Illustraions etc</b></label>
                         <ul class="list-group list-group-flush">

                        <li class="list-group-item"><input type="radio" name="11" value="1" >Very Poor</li>
                        <li class="list-group-item"><input type="radio" name="11" value="2" >Poor</li>
                        <li class="list-group-item"><input type="radio" name="11" value="3" >Average</li>
                        <li class="list-group-item"><input type="radio" name="11" value="4">Good</li>
                        <li class="list-group-item"><input type="radio" name="11" value="5" >Very Good</li>

</ul>
                           
    <br>

          

       

              
                        <input type="submit" value="submit" class="btn btn-primary" name="submit">
               </form>
               </div>

               