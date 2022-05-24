<?php
session_start();
$apiaristID = $_SESSION["userID"];

$productID = $_POST['productID'];
$revenue = $_POST['revenue'];
$dateOfEntry = $_POST['dateOfEntry'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO accountbook (apiaristID, productID, revenue, dateOfEntry) VALUES ('$apiaristID', '$productID', '$revenue', '$dateOfEntry')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>