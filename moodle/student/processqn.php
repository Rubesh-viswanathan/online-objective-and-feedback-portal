<?php
session_start();
include('connect.php');
if(!isset($_SESSION['login_user']))
{
  
  header("location:/moodle/login.php");
  
}

unset($_SESSION['id']);
unset($_SESSION['qno']);
unset($_SESSION['test']);



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

         
    
    <div class="container">
        <h1>Result</h1>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        
                        
                        <th>CO</th>
                       <th>Number of questions</th>
                       <th>Correct answers</th>
                       <th>% success</th>
                       
                       
                       <?php
                        $row;
                        $sql="select co,sum(mark),count(question)  FROM `qt` where tid =".$_SESSION['tid']." group by co";
                        $result=mysqli_query($conn,$sql);
                        while($row = $result->fetch_assoc()){
                            $success=$row['sum(mark)']/$row['count(question)']*100;
                     ?></tr>
                     </thead>
                     <tbody>
                    <tr>
                                            
                                            <td><?php echo htmlentities($row['co']);?></td>
                                            <td><?php echo htmlentities($row['count(question)']);?></td>
                                            <td><?php echo htmlentities($row['sum(mark)']);?></td>
                                            <td><?php echo htmlentities($success);?></td>
                                           
                                            
                        </tr><?php }?>
                </tbody>
                </table>
                </div>
                <hr>
                <p class="lead">You Have Scored <?php
                $mar="SELECT sum(mark) FROM `qt` where tid=".$_SESSION['tid'];
                $result1=mysqli_query($conn,$mar);
                $mar_result=$result1->fetch_assoc();
                echo $mar_result['sum(mark)'];
                ?> marks</p>       
                <hr>
                <p>Return to <a href="home.php">Home</a>     
</div>
</body>
</html>