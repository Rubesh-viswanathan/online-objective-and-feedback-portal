<?php
include('connect.php');

$sql = "DELETE FROM students WHERE StudentRegno=";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


?>
