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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>report</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</head>
<body>
    <form id="form1">
    <div id="dvContainer">
    <div class="card-w-10">
    <div class="card-body">
    <br>
        <header style="text-align: center;">
            <h1>REPORT</h1>
        </header>
        <br>
        <table class="table table-bordered" style="text-align: center;">
        <thead>
        <tr>
        <th scope="col">S NO</th>
        <th scope="col">ROLL NO</th>
        <th scope="col">NAME</th>
        <th scope="col">COURSE</th>
        <th scope="col">MARKS</th>
        <th scope="col">CO1</th>
        <th scope="col">CO2</th>
        </tr>
        </thead>
        <tbody>
        <tr><?php $row;
                    $sql="SELECT * FROM `result` where tid=2";
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                    ?>
        <td><?php  $sno=0;$sno++;
                    echo($sno); ?> 
        <td><?php  echo($row['regno']);?></td>
        <td><?php   $sql='select name FROM login where id='.$row['regno'];
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc())
                    echo($row['name']);?></td>
        <td><?php   $row;
                    $sql="SELECT sname FROM `addtest` where tid=2";
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                    echo($row['sname']);}
        ?></td>
        <td><?php   $row;
                    $marks=0;
                    $countt=0;
                    $sql='select mark from result where regno='.$_SESSION['rno'];
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                    $marks = $marks + $row['mark'];
                    $countt++;}
                    echo($marks . "/" . $countt);
        ?></td>
        <td><?php   $row;
                    $marks=0;
                    $countt=0;
                    $sql='select mark from result where co=1 and regno='.$_SESSION['rno'];
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                    $marks = $marks + $row['mark'];
                    $countt++;}
                    echo($marks . "/" . $countt);
        ?></td>
        <td><?php   $row;
                    $marks=0;
                    $countt=0;
                    $sql='select mark from result where co=2 and regno='.$_SESSION['rno'];
                    $result=mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                    $marks = $marks + $row['mark'];
                    $countt++;}
                    echo($marks . "/" . $countt);
        ?></td>
        </tr> <?php } ?>
        </tbody>
        </table>    
    </div>
    </div>
    </div>
    </form>
</body>
</html>