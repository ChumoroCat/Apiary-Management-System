<?php
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

// Attempt insert query execution
$sql = "INSERT INTO inspection (taskDescription, startDate, endDate, actualInspectionDate, assignedTo, reminderDate, reminderTime, observation, completionStatus) 
VALUES ('$taskDescription', '$startDate', '$endDate', '$actualInspectionDate', '$assignedTo', '$reminderDate', '$reminderTime', '$observation', '$completionStatus')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>