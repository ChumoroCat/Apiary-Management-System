<?php
session_start();
$apiaristID = $_SESSION["userID"];

$apiaryName = $_POST['apiaryName'];
$apiaryLocation = $_POST['apiaryLocation'];
$mapCoordinates = $_POST['mapCoordinates'];
$typeOfFlora = $_POST['typeOfFlora'];
$noOfHive = $_POST['noOfHive'];
$dateCreated = $_POST['dateCreated'];

/*
if($_POST['mapCoordinates']){
	$data_arr = geocode($_POST['mapCoordinates']); // get latitude and longitude
	if($data_arr){ // if able to geocode the address
	    $latitude = $data_arr[0];
	    $longitude = $data_arr[1];
	}
	$mapCoordinates = $latitude . "," . $longitude;
}
*/


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt to insert
$sql = "INSERT INTO apiary (apiaryName, apiaristID, apiaryLocation, mapCoordinates, typeOfFlora, noOfHive, dateCreated)
VALUES ('$apiaryName', '$apiaristID' ,'$apiaryLocation', '$mapCoordinates', '$typeOfFlora', '$noOfHive', '$dateCreated')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>