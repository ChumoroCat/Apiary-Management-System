<?php
$hiveID = $_POST['hiveID'];
$apiaryID = $_POST['apiaryID'];
$typeOfHive = $_POST['typeOfHive'];
$noOfFrame = $_POST['noOfFrame'];
$dateCreated = $_POST['dateCreated'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE hive SET apiaryID = '$apiaryID', typeOfHive = '$typeOfHive', noOfFrame = '$noOfFrame', dateCreated = '$dateCreated' WHERE hiveID = '". $hiveID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>