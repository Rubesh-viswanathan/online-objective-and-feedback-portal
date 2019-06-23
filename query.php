<?php
include('connect.php');

    $query="select max(id) from qt";
    $result=mysqli_query($conn,$query);
    $qid=$result->fetch_assoc();
    $id=$qid['max(id)']+1;
$question = "When we perform subtraction on -7 and -5 the answer in 2's compliment is_______";
$co = "2";
$tid="2";
$ot1="11110";
$ot2="1110";
$ot3="101010";
$ot4="0010";
$cot="1110";
$conn =  new mysqli($servername, $username, $pass,$database);
$sql = "insert into qt (id,question,co,ot1,ot2,ot3,ot4,cot,tid)
values('$id','$question','$co','$ot1','$ot2','$ot3','$ot4','$cot','$tid')";

$result=mysqli_query($conn,$sql);




