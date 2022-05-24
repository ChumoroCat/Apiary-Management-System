<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM inspection LEFT JOIN hive ON inspection.hiveID = hive.hiveID LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID WHERE (apiarist.apiaristID = $apiaristID AND completionStatus = 'Pending') OR (apiarist.apiaristID = $apiaristID AND completionStatus = 'Warning Sent') OR (apiarist.apiaristID = $apiaristID AND completionStatus = 'Reminder Sent') ORDER BY actualInspectionDate";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="inspection-schedule-detail" id="a'. $row['inspectionID'] . '">';
    echo '<p class="inspection-schedule-detail-hive">' . $row['typeOfHive'] . '</p>';
    echo '<p class="inspection-schedule-detail-date">' . $row['actualInspectionDate'] . '</p>';
    echo '<p class="inspection-schedule-detail-status">' . $row['completionStatus'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit-schedule" id="'. $row['inspectionID'] . '">Edit</button>';
    echo '<button class="record_delete-schedule" id="'. $row['inspectionID'] . '">Delete</button>';
    echo '<button class="record_inspect" id="'. $row['inspectionID'] . '">Inspect</button>';
    echo '</div>';
    echo '</div>';
    } 
    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-inspection-schedule.js"></script>';
    echo '<script src="insert scripts/inspect-buttons-inspection-schedule.js"></script>';
    echo '<script src="delete scripts/delete-buttons-inspection-schedule.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>