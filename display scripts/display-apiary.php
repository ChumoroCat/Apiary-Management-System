<?php
session_start();
$apiaristID = $_SESSION["userID"];

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM apiary where apiaristID = '$apiaristID'";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="apiary-record-detail" id="a'. $row['apiaryID'] . '">';
    echo '<p class="apiary-record-detail-apiary">' . $row['apiaryName'] . '</p>';
    echo '<p class="apiary-record-detail-location">' . $row['apiaryLocation'] . '</p>';
    echo '<p class="apiary-record-detail-coordinates">' . $row['mapCoordinates'] . '</p>';
    echo '<p class="apiary-record-detail-flora">' . $row['typeOfFlora'] . '</p>';
    echo '<p class="apiary-record-detail-noofhives">' . $row['noOfHive'] . '</p>';
    echo '<p class="apiary-record-detail-date">' . $row['dateCreated'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit" id="'. $row['apiaryID'] . '">Edit</button>';
    echo '<button class="record_delete" id="'. $row['apiaryID'] . '">Delete</button>';
    echo '</div>';
    echo '</div>';
    } 
    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-apiary.js"></script>';
    echo '<script src="delete scripts/delete-buttons-apiary.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}

// Close connection
mysqli_close($conn);
?>