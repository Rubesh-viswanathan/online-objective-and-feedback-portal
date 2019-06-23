<?php
session_start();  
$from_time1=date("Y-m-d H:i:s");
$to_time1=$_SESSION['end_time'];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);
$difference=$timesecond-$timefirst;
if($difference>0)
{
    echo gmdate("H:i:s",$difference);
}
else
{
    echo ("00:00:00");
}
    
?>