<?php
$hiveID = $_POST['hiveID'];
$description = $_POST['description'];
$compositionOfColony = $_POST['composition'];


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO colony (hiveID, description, compositionOfColony) VALUES ('$hiveID', '$description', '$compositionOfColony')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>