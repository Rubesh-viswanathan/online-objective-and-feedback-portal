<?php
include('connect.php');
if($_SESSION['qno']>$_SESSION['count'])
{
    ?><script>window.alert("test added successfully");</script><?php
    unset($_SESSION['tid']);
    header("location:viewtest.php");
}
if(isset($_POST['submit']))
{
    $query="select max(id) from qt";
    $result=mysqli_query($conn,$query);
    $qid=$result->fetch_assoc();
    $id=$qid['max(id)']+1;
$question = $_POST['question'];
$co = $_POST['co'];
$tid=$_SESSION['tid'];
$ot1=$_POST['ot1'];
$ot2=$_POST['ot2'];
$ot3=$_POST['ot3'];
$ot4=$_POST['ot4'];
$cot=$_POST['cot'];
$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
$image = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));
    }
$conn =  new mysqli($servername, $username, $pass,$database);
$sql = "insert into qt (id,question,co,ot1,ot2,ot3,ot4,cot,tid,img)
values('$id','$question','$co','$ot1','$ot2','$ot3','$ot4','$cot','$tid','$imgContent')";
if($cot==$ot1||$cot==$ot2||$cot==$ot3||$cot==$ot4)
{
$result=mysqli_query($conn,$sql);
$_SESSION['qno']++;
?>
<script>
window.alert("question added successfully");
</script>
<?php

}
else
{
    ?>
    <script>
        window.alert("Enter correct option")
    </script>
    <?php
}

}
?>


