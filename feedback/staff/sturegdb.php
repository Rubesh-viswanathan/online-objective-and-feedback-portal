<?php
include('connect.php');
if(isset($_POST['submit']))
{
$studentname = $_POST['studentname'];
$studentregno = $_POST['studentregno'];
$dept = $_POST['dept'];
$section = $_POST['section'];
$batch = $_POST['batch'];
$password = ($_POST['password']);
$num_length = strlen((string)$studentregno);
$conn =  new mysqli($servername, $username, $pass,$database);
$check="select * from students where StudentRegno='$studentregno'";
$row=mysqli_query($conn,$check);
if(mysqli_num_rows($row)==0)
{
if($num_length==7)
{

    $sql = "insert into students (studentName,StudentRegno,password,department,section,batch)
    values('$studentname' , '$studentregno ' ,'$password','$dept','$section','$batch')";
mysqli_query($conn,$sql);
$sql2="INSERT INTO `login` (`name`, `id`, `password`, `type`) VALUES ('$studentname', '$studentregno', '$password', 'student')";
mysqli_query($conn,$sql2);
$sql3="CREATE TABLE ".$studentregno." (tid INT(6), qid INT(6),mark INT(6),co INT(6))";
mysqli_query($conn,$sql3);
?>
<script>
window.alert("registered successfully");
</script>
<?php
}
else{
    $error="Enter a valid regno";
}
}
else{
    $error="Register number already registered";
}
}
?>