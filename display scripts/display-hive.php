<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT hiveID, apiaryName, typeOfHive, noOfFrame, hive.dateCreated  FROM hive LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="hives-record-detail" id="a'. $row['hiveID'] . '">';
    echo '<p class="hives-record-detail-apiary">' . $row['apiaryName'] . '</p>';
    echo '<p class="hives-record-detail-type">' . $row['typeOfHive'] . '</p>';
    echo '<p class="hives-record-detail-noofframes">' . $row['noOfFrame'] . '</p>';
    echo '<p class="hives-record-detail-date">' . $row['dateCreated'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit" id="'. $row['hiveID'] . '">Edit</button>';
    echo '<button class="record_delete" id="'. $row['hiveID'] . '">Delete</button>';
    echo '</div>';
    echo '</div>';
    } 
    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-hive.js"></script>';
    echo '<script src="delete scripts/delete-buttons-hive.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>