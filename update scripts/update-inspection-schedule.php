<?php
$inspectionID = $_POST['inspectionID'];
$hiveID = $_POST['hiveID'];
$actualInspectionDate = $_POST['actualInspectionDate'];
$completionStatus = $_POST['completionStatus'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE inspection SET hiveID = '$hiveID', actualInspectionDate = '$actualInspectionDate', completionStatus = '$completionStatus'  WHERE inspectionID = '$inspectionID';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>