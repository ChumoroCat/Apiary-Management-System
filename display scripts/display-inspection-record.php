<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM inspection LEFT JOIN hive ON inspection.hiveID = hive.hiveID LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID AND completionStatus = 'Completed'";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="inspection-record-detail" id="a'. $row['inspectionID'] . '">';
    echo '<p class="inspection-record-detail-hive">' . $row['typeOfHive'] . '</p>';
    echo '<p class="inspection-record-detail-date">' . $row['actualInspectionDate'] . '</p>';
    echo '<p class="inspection-record-detail-observation">' . $row['observation'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit" id="'. $row['inspectionID'] . '">Edit</button>';
    echo '<button class="record_delete-inspection" id="'. $row['inspectionID'] . '">Delete</button>';
    echo '</div>';
    echo '</div>';
    } 
    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-inspection-record.js"></script>';
    echo '<script src="delete scripts/delete-buttons-inspection-record.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>