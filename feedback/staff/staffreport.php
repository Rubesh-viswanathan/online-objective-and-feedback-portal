<?php

session_start();

$cop=array();

$copn=array("0","0","0","0","0","0","0");

$co1p=0;

$co2p=0;

if(!isset($_SESSION['login_user']))

{

  

    header("location:/login.php");

  

}

include('connect.php');

if(!isset($_SESSION['tid']))

{

    header("location:viewtest.php");

}

unset($_SESSION['id']);

unset($_SESSION['qno']);

unset($_SESSION['test']);



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

    <div class="container">

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
        
        <th scope="col">S. NO</th>

        <th scope="col">ROLL NO</th>

        <th scope="col">NAME</th>

        <th scope="col">COURSE CODE</th>

        <th scope="col">TOTAL MARKS</th>

        <?php

        $cosql='select distinct co from result where tid='.$_SESSION['tid'];

        $resultco=mysqli_query($conn,$cosql);

        while($co = $resultco->fetch_assoc())

        {

            ?>

        <th scope="col">CO<?php echo $co['co']?></th>

        <?php

        }

        ?>

        </tr>

        </thead>

        <tbody>

        <?php

                        $num=0;

                        $rsql='select distinct regno from result where tid='.$_SESSION['tid'].' ORDER BY regno';

                        $result3=mysqli_query($conn,$rsql);

                        

                        while($rno = $result3->fetch_assoc())

                        {

                            ?>

        <tr>

        <td><?php  echo($num+1);?></td>

        <td><?php  echo($rno['regno']);?></td>

        <td><?php  

             $nsql='select studentname from students where studentregno='.$rno['regno'];

             $result2=mysqli_query($conn,$nsql);

             $name = $result2->fetch_assoc();

             echo($name['studentname']);

             ?>

        </td>

        <td><?php   $row;

                    $sql="SELECT scode FROM `addtest` where tid=".$_SESSION['tid'];

                    $result=mysqli_query($conn,$sql);

                    while($row = $result->fetch_assoc()){

                    echo($row['scode']);}



        ?></td>

        <td><?php   $row;

                    $marks=0;

                    $countt=0;

                    $sql='select sum(mark) from result where regno='.$rno['regno'].' and tid='.$_SESSION['tid'];

                    $result=mysqli_query($conn,$sql);

                    $row = $result->fetch_assoc();

                    $marks =  $row['sum(mark)'];

                    $sql1='select count(question) from qt where  tid='.$_SESSION['tid'];

                    $result1=mysqli_query($conn,$sql1);

                    $row1 = $result1->fetch_assoc();

                    $countt=$row1['count(question)'];

                    if($countt>0){$tot=$marks / $countt*100;}

                    echo($marks . "/" . $countt);

        ?></td>

         <?php

        $cosql='select distinct co from result where tid='.$_SESSION['tid'];

        $resultco=mysqli_query($conn,$cosql);

        while($co = $resultco->fetch_assoc())

        {

            ?>

        <td><?php   $row;

                    $marks=0;

                    $countt=0;

                    $sql='select sum(mark) from result where co='.$co['co'].' and regno='.$rno['regno'].' and tid='.$_SESSION['tid'];

                    $result=mysqli_query($conn,$sql);

                    $row = $result->fetch_assoc();

                    $marks =$row['sum(mark)'];

                    $sql1='select count(question) from qt where co='.$co['co'].' and tid='.$_SESSION['tid'];

                    $result1=mysqli_query($conn,$sql1);

                    $row1 = $result1->fetch_assoc();

                    $countt=$row1['count(question)'];

                    if($countt>0){$co1=$marks / $countt*100;

                    $cop[$co['co']][$num]=$co1;

                    }

                    echo($marks . "/" . $countt);

        ?></td>

            <?php

                }

            ?>

        </tr>

        <?php $num++;} ?>

                   

        </tbody> 

        </table>  

        <?php

            $fin='select sum(mark),count(distinct regno) from result where tid='.$_SESSION['tid'];

            $result4=mysqli_query($conn,$fin);

            $fin_val = $result4->fetch_assoc();

            $nostud=$fin_val['count(distinct regno)'];

            $marks=$fin_val['sum(mark)'];

            $sql1='select count(question) from qt where  tid='.$_SESSION['tid'];

            $result1=mysqli_query($conn,$sql1);

            $row1 = $result1->fetch_assoc();

            $totalmarks=$row1['count(question)']*$nostud;

            $per=($marks/$totalmarks)*100;

            

            $cosql='select distinct co from result where tid='.$_SESSION['tid'];

            $resultco=mysqli_query($conn,$cosql);

            while($co = $resultco->fetch_assoc())

            {

                for ($i=0;$i<$num;$i++) 

                {

                    if($cop[$co['co']][$i]>60)

                        {

                            $copn[$co['co']]++;

                        }

                }

            }

            

                  

        ?>



    </div>

    </div>

    <p>Total percentage: <?php echo round($per,2);?>%</p>

    <?php

    $cosql='select distinct co from result where tid='.$_SESSION['tid'];

            $resultco=mysqli_query($conn,$cosql);

            while($co = $resultco->fetch_assoc())

            {?>

    <p>CO <?php echo $co['co']?> PASS:<?php echo $copn[$co['co']];?></p>

            <?php 

            }

            ?>    

    <p>Return to <a href="home.php">Home</a>  

    </div>

    </form>

   

</body>



</html>