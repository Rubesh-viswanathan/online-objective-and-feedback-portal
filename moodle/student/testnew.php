<?php
include('connect.php');

$options=array("ot1","ot2","ot3","ot4");
shuffle($options);
if(!isset($_SESSION))
{
  session_start();
 }
 if(!isset($_SESSION['login_user']))
{
  
  header("location:/moodle/login.php");
  
}

 if(!isset($_SESSION['tid']))
 {
    header("location:home.php");
 }
 if(isset($_POST['id']))
{
    $_SESSION['qno']=$_POST['id'];
}
if(!isset($_SESSION['test']))
{
    $min="select min(id),max(id),count(id) from qt where tid=".$_SESSION['tid'];
    $query2=$conn->query($min) or die($conn->error);;
    $min_result = $query2->fetch_assoc();
    $_SESSION['id']=$min_result['min(id)'];
    $_SESSION['qno']=1;
    $_SESSION['test']="true";
    $ans=array();
    $_SESSION['tot']=$min_result['count(id)'];
    $_SESSION['ans']=$ans;
    $shu="select id from qt where tid=".$_SESSION['tid'];
    $query3=$conn->query($shu) or die($conn->error);;
    $qn=array();
    $_SESSION['qn']=$qn;
    for($i=0;$shu_result = $query3->fetch_assoc();$i++)
    {
        $_SESSION['qn'][$i]=$shu_result['id'];
    }
    shuffle($_SESSION['qn']);
    $val="select * from result where tid=".$_SESSION['tid']." and regno = ".$_SESSION['rno'];
    $queryv=$conn->query($val) or die($conn->error);;
    $val_result = $queryv->fetch_assoc();
    if(mysqli_num_rows($queryv)>0)
    {
        header("location:reportt.php");  
    }
}
if(isset($_POST['finish']))
{
    $sql="select question,ot1,ot2,ot3,ot4,cot,co from qt where id=".$_SESSION['id']."";
    $result=mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
$max="select max(id) from qt";
$query1=$conn->query($max) or die($conn->error);;
$max_result = $query1->fetch_assoc();
if(isset($_POST['answer']))
{
    $_SESSION['ans'][$_SESSION['qno']]=$_POST['answer'];
if($_POST['answer']==$row['cot'])
{
$ck="select * from result where qid =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
$query2=$conn->query($ck);
$dup = $query2->fetch_assoc();
    if($dup['tid'])
    {
        $up="UPDATE result SET `mark` = '1' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
        $query2=$conn->query($up) or die($conn->error); 
    }
    else
    {   
        $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '1',".$row['co'].")";
        $query2=$conn->query($up) or die($conn->error); 
    }
}
else
{
    $ck="select * from result where qid =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
    $query2=$conn->query($ck);
    $dup = $query2->fetch_assoc();
    if($dup['tid'])
        {
            $up="UPDATE result SET `mark` = '0' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
            $query2=$conn->query($up) or die($conn->error); 
        }
        else
        {   
            $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '0',".$row['co'].")";
            $query2=$conn->query($up) or die($conn->error); 
        }
}
}

if($_SESSION['id']<$max_result['max(id)'])
{ $_SESSION['id']=$_SESSION['id']+1;
$_SESSION['qno']=$_SESSION['qno']+1;
}
    
    header("location:reportt.php");
}
if(isset($_POST['next']))
{
    $sql="select question,ot1,ot2,ot3,ot4,cot,co from qt where id=".$_SESSION['id']."";
            $result=mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
    $max="select count(id) from qt where tid=".$_SESSION['tid'];
    $query1=$conn->query($max) or die($conn->error);
    $max_result = $query1->fetch_assoc();
    if(isset($_POST['answer']))
    {
        $_SESSION['ans'][$_SESSION['qno']]=$_POST['answer'];
        if($_POST['answer']==$row['cot'])
        {
        $ck="select * from result where tid=".$_SESSION['tid']." and regno=".$_SESSION['rno']." and qid=".$_SESSION['id'];
        $query2=$conn->query($ck)or die($conn->error);
        $dup = $query2->fetch_assoc();
        if($dup['tid'])
            {
                $up="UPDATE result SET `mark` = '1' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
                $query2=$conn->query($up) or die($conn->error); 
            }
            else
            {   
                $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '1',".$row['co'].")";
                $query2=$conn->query($up) or die($conn->error); 
            }
        }
        else
        {
            $ck="select * from result where qid =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
            $query2=$conn->query($ck)or die($conn->error);
            $dup = $query2->fetch_assoc();
    if($dup['tid'])
                {
                    $up="UPDATE result SET `mark` = '0' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
                    $query2=$conn->query($up) or die($conn->error); 
                }
                else
                {   
                    $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '0',".$row['co'].")";
                    $query2=$conn->query($up) or die($conn->error); 
                }
        }
    }
    if($_SESSION['qno']<$_SESSION['tot'])
      { 
        $_SESSION['qno']=$_SESSION['qno']+1;
}

}

if(isset($_POST['previous']))
{
    $sql="select question,ot1,ot2,ot3,ot4,cot,co from qt where id=".$_SESSION['id']." and tid=".$_SESSION['tid'];
    $result=mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $min="select min(id) from qt where tid=".$_SESSION['tid'];
    $query2=$conn->query($min) or die($conn->error);;
    $min_result = $query2->fetch_assoc();
   if(isset($_POST['answer']))
    {
        if($_POST['answer']==$row['cot'])
        {
            $_SESSION['ans'][$_SESSION['qno']]=$_POST['answer'];
        $ck="select * from result where qid =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
        $query2=$conn->query($ck);
        $dup = $query2->fetch_assoc();
    if($dup['tid'])
            {
                $up="UPDATE result SET `mark` = '1' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
                $query2=$conn->query($up) or die($conn->error); 
            }
            else
            {   
                $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '1',".$row['co'].")";
                $query2=$conn->query($up) or die($conn->error); 
            }
        }
        else
        {
            $ck="select * from result where qid =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
            $query2=$conn->query($ck);
            $dup = $query2->fetch_assoc();
    if($dup['tid'])
                {
                    $up="UPDATE result SET `mark` = '0' WHERE `qid` =".$_SESSION['id']." and regno =".$_SESSION['rno']." and tid=".$_SESSION['tid'];
                    $query2=$conn->query($up) or die($conn->error); 
                }
                else
                {   
                    $up="INSERT INTO result (tid, qid, regno, mark,co) VALUES (".$_SESSION['tid'].", ".$_SESSION['id'].", ".$_SESSION['rno'].", '0',".$row['co'].")";
                    $query2=$conn->query($up) or die($conn->error); 
                }
        }
}
    if($_SESSION['qno']>1)
    {
   
    $_SESSION['qno']=$_SESSION['qno']-1;
    }
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
        <a class="nav-link active"href="viewteststud.php">View Test</a>
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
    
          
        <br>
        <div class="row">
        <div class ="col-md-3" style="margin-left:2%;">
        
        <br>
        <br>
        
            <?php
                $i=0;
                $b=1;
                $tot=$_SESSION['tot'];
                for($i=0;$b<=$tot;$i++)
                {
                    ?>
                   <div class="row" >    
                    <?php
                    for($j=0;$j<5&&$b<=$tot;$j++)
                    {
                        ?>
                            <form  method="post">
                                <input type ="text" name="id" style="display:none;" value="<?php echo $b ?>">
                                <?php
                                if(isset($_SESSION['ans'][$b]))
                                {
                                   ?>
                                   
                                   <input type="submit" class="btn btn-success" id= "<?php echo $b ?>" name= "qn" value= "<?php echo $b ?>" style="margin:5px;height:45px;width:45px;">
                                   <?php 
                                }
                                else
                                {
                                ?>
                                
                                <input type="submit" class="btn btn-muted" id= "<?php echo $b ?>" name= "qn" value= "<?php echo $b ?>" style="margin:5px;height:45px;width:45px;">
                                <?php
                                }
                                ?>
                                </form>
                        <?php
                        $b++;
                    }
                    ?> <?php
                }
            
            
            ?>
            
            </div>
            </div>
            
            <div class="col-md-8" >
            <div id="response" style="font-size:18px;"></div>
        <br>
            <?php
            $row;
            $sql="select question,ot1,ot2,ot3,ot4,cot from qt where id=".$_SESSION['qn'][($_SESSION['qno']-1)]."";
            $_SESSION['id']=$_SESSION['qn'][($_SESSION['qno']-1)];
            $result=mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
            $chk="select min(id),max(id),count(id) from qt where tid=".$_SESSION['tid'];
            $query2=$conn->query($chk) or die($conn->error);;
            $chk_result = $query2->fetch_assoc();
            ?>
          
            <div class="card" id="ques">
                    <div class="card-body">
                        <p class="card-text">
                            <form method="post" autocomplete="on">
                            <?php echo htmlentities($_SESSION['qno']);
                            echo". ";
                            echo htmlentities( $row['question']);
                           
                            ?>
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><input type="radio" name="answer" value="<?php echo htmlentities($row[$options[0]]);?>" id="ot1"> <?php echo htmlentities($row[$options[0]]);?></li>
                            <li class="list-group-item"><input type="radio" name="answer" value="<?php echo htmlentities($row[$options[1]]);?>" id="ot2"> <?php echo htmlentities($row[$options[1]]);?></li>
                            <li class="list-group-item"><input type="radio" name="answer" value="<?php echo htmlentities($row[$options[2]]);?>" id="ot3"> <?php echo htmlentities($row[$options[2]]);?></li>
                            <li class="list-group-item"><input type="radio" name="answer" value="<?php echo htmlentities($row[$options[3]]);?>" id="ot4"> <?php echo htmlentities($row[$options[3]]);?></li>
                        </ul>
                    </div>
                </div> 
                <br>
                <input type="submit" value="Prev"class="btn" name="previous"id="prev">
                <input type="submit" value="Next"class="btn" name="next"id="next">
                <input type="submit" value="Finish"class="btn" name="finish"id="finish"style="display:none;" >
                </div>
                </div>
                </div>
               <script>
                var next=document.getElementById("next");
                var prev=document.getElementById("prev");
                var finish=document.getElementById("finish")
                var ot1=document.getElementById("ot1");
                var ot1v="<?php echo $row[$options[0]]?>";
                var ot2=document.getElementById("ot2");
                var ot2v="<?php echo $row[$options[1]]?>";
                var ot3=document.getElementById("ot3");
                var ot3v="<?php echo $row[$options[2]]?>";
                var ot4=document.getElementById("ot4");
                var ot4v="<?php echo $row[$options[3]]?>";
                var i=0;
                var qno="<?php echo $_SESSION['qno']?>";
                var max="<?php echo $chk_result['count(id)']?>";
                var min=0;
                var ans;
                
            
                if(ot1v=="<?php echo $_SESSION['ans'][$_SESSION['qno']]?>")
                {
                    ot1.setAttribute("checked","true");
                }
                if(ot2v=="<?php echo $_SESSION['ans'][$_SESSION['qno']]?>")
                {
                    ot2.setAttribute("checked","true");
                }
                if(ot3v=="<?php echo $_SESSION['ans'][$_SESSION['qno']]?>")
                {
                    ot3.setAttribute("checked","true");
                }
                if(ot4v=="<?php echo $_SESSION['ans'][$_SESSION['qno']]?>")
                {
                    ot4.setAttribute("checked","true");
                }
                if(qno==max)
                {
                    next.setAttribute("class", "btn btn disabled");
                    finish.setAttribute("style","display:inline;")
                }
                if(qno==1)
                {
                    prev.setAttribute("class", "btn btn disabled");
                }</script>
                <script>
                setInterval(function()
{
var xmlhttp= new XMLHttpRequest();
xmlhttp.open("GET","response.php",false);
xmlhttp.send(null);
document.getElementById("response").innerHTML=xmlhttp.responseText;
if(xmlhttp.responseText=="00:00:00")
{
    window.alert("Time UP");
    window.location="reportt.php";
}
},1000);
               
              </script> 
               </form>
               