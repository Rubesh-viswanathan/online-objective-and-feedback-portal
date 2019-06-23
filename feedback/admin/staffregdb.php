<?php

include('connect.php');
if(isset($_POST['submit']))
{
$staffid = $_POST['staffid'];
$staffname = $_POST['staffname'];
$department = $_POST['dept'];
$password = ($_POST['password']);
$conn =  new mysqli($servername, $username, $pass,$database);

$check="select * from staffs where staffid=".$staffid;
$row=mysqli_query($conn,$check);
if(mysqli_num_rows($row)==0)
{
    $sql = "insert into staffs (staffid,staffname,department,password)
    values('$staffid' , '$staffname' ,'$department','$password')";
   mysqli_query($conn,$sql);
   $sql2="INSERT INTO `login` (`name`, `id`, `password`, `type`) VALUES ('$staffname', '$staffid', '$password', 'staff')";
   mysqli_query($conn,$sql2);
?>
<script>
window.alert("registered successfully");
</script>
<?php
}


else{
    $error="Register number already registered";
}
}
?>