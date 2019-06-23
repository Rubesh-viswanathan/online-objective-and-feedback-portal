<?php
include('connect.php');

if(isset($_POST['submit']))
{
$regno = $_POST['username'];
$password = $_POST['password'];
$conn =  new mysqli($servername, $username, $pass,$database);
$sql = "SELECT * from login where id ='".$regno."' AND password = '".$password."'";
$row=mysqli_query($conn,$sql);
/*$stmt= $conn->prepare($sql);
$stmt-> bind_param("ss",$staff_id,$password);
$stmt->execute();
$stmt->bind_result($staff_id,$password);
$stmt->store_result();
*/


if(mysqli_num_rows($row)==1)
{
$result = $row->fetch_assoc();
$_SESSION['login_user']=$result['name'];
$_SESSION['rno']=$result['id'];
if($result['type']=="admin")
{
    header("location:admin/viewfeedback.php");
}
if($result['type']=="staff")
{
    header("location:staff/home.php");
}
if($result['type']=="student")
{
    
    header("location:student/viewfeedback.php");
}
}

else{
    $error="Username or Password is invalid";
}

}
?>



