<?php
$colonyID = $_POST['colonyID'];
$hiveID = $_POST['hiveID'];
$description = $_POST['description'];
$compositionOfColony = $_POST['compositionOfColony'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE colony SET hiveID = '$hiveID', description = '$description', compositionOfColony = '$compositionOfColony' WHERE colonyID = '". $colonyID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>