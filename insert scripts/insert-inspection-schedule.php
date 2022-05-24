<?php
$hiveID = $_POST['hiveID'];
$actualInspectionDate = $_POST['actualInspectionDate'];
$completionStatus = $_POST['completionStatus'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO inspection (hiveID, actualInspectionDate, completionStatus) 
VALUES ('$hiveID', '$actualInspectionDate', '$completionStatus')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>