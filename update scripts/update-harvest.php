<?php
$harvestID = $_POST['harvestID'];
$hiveID = $_POST['hiveID'];
$quantity = $_POST['quantity'];
$dateOfHarvest = $_POST['dateOfHarvest'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE harvest SET hiveID = '$hiveID', quantity = '$quantity', dateOfHarvest = '$dateOfHarvest' WHERE harvestID = '". $harvestID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>