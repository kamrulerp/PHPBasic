<?php
include 'dbConnection.php';
$student_id = $_GET['id'];

$sql = "DELETE FROM `students` WHERE student_id='".$student_id."' ";
$query = $conn->query($sql);

if($query){
    echo "Data deleted successfully";
    header('Location: dataView.php');
}else{
    echo "Data not deleted";
}
?>