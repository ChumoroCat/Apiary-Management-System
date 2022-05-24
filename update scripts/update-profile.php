<?php
session_start();
$apiaristID = $_SESSION["userID"];

$companyName = $_POST['companyName'];
$registrationNo = $_POST['registrationNo'];
$registrationTerritory = $_POST['registrationTerritory'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$residentialAddress = $_POST['residentialAddress'];
$emailAddress = $_POST['emailAddress'];
$contactNo = $_POST['contactNo'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE apiarist SET companyName = '$companyName', registrationNo = '$registrationNo', registrationTerritory = '$registrationTerritory', firstName = '$firstName', lastName = '$lastName', residentialAddress = '$residentialAddress', emailAddress = '$emailAddress', contactNo = '$contactNo' WHERE apiaristID = '$apiaristID'";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>