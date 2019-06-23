<?php
include('connect.php');
session_start();
$_SESSION['tid']=2;
 $sql='select * from addtest where tid='.$_SESSION['tid'];
$result=mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$duration=$row['time'];
$_SESSION['duration']=$duration;
$_SESSION['start_time']=date("Y-m-d H:i:s");
$endtime=date('Y-m-d H:i:s',strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
$_SESSION['end_time']=$endtime;
?>
<script>
window.location=testnew.php;
</script>
