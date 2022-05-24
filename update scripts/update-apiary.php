<?php
$apiaryID = $_POST['apiaryID'];
$apiaryName = $_POST['apiaryName'];
$apiaryLocation = $_POST['apiaryLocation'];
$mapCoordinates = $_POST['mapCoordinates'];
$typeOfFlora = $_POST['typeOfFlora'];
$noOfHive = $_POST['noOfHive'];
$dateCreated = $_POST['dateCreated'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE apiary SET apiaryName = '$apiaryName', apiaryLocation = '$apiaryLocation', mapCoordinates = '$mapCoordinates', typeOfFlora = '$typeOfFlora', noOfHive = '$noOfHive', dateCreated = '$dateCreated' WHERE apiaryID = '". $apiaryID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>