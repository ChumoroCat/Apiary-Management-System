<?php
$harvestID = $_POST['harvestID'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "DELETE FROM harvest WHERE harvestID = '". $harvestID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records deleted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>