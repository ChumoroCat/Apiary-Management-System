<?php
$inspectionID = $_POST['inspectionID'];
$taskDescription = $_POST['taskDescription'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$actualInspectionDate = $_POST['actualInspectionDate'];
$assignedTo = $_POST['assignedTo'];
$reminderDate = $_POST['reminderDate'];
$reminderTime = $_POST['reminderTime'];
$observation = $_POST['observation'];
$completionStatus = $_POST['completionStatus'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE inspection SET taskDescription = '$taskDescription', startDate = '$startDate', endDate = '$endDate', actualInspectionDate = '$actualInspectionDate', assignedTo = '$assignedTo', reminderDate = '$reminderDate', reminderTime = '$reminderTime', observation = '$observation', completionStatus = '$completionStatus' WHERE inspectionID = '". $inspectionID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>