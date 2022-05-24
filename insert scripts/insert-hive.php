<?php
$apiaryID = $_POST['apiaryID'];
$typeOfHive = $_POST['typeOfHive'];
$noOfFrame = $_POST['noOfFrame'];
$dateCreated = $_POST['dateCreated'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO hive (apiaryID, typeOfHive, noOfFrame, dateCreated) VALUES ('$apiaryID', '$typeOfHive', '$noOfFrame', '$dateCreated')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>