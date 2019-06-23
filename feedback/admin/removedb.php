<?php
include('connect.php');
if(isset($_POST['submit']))
{   
    //echo($_POST['tid'].$_POST['rollno']);
    $sql ="delete from result where result.tid=".$_POST['tid']." and result.regno=".$_POST['rollno'];
    mysqli_query($conn,$sql);
?>
<script>
window.alert("removed successfully");
</script>
<?php
}
?>