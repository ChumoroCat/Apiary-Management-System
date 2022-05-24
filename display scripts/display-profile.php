<?php
session_start();
$apiaristID = $_SESSION["userID"];

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM apiarist where apiaristID = '$apiaristID'";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<li class="profile-detail-list-item-firstname">'. $row['firstName'] . '</li>';
    echo '<li class="profile-detail-list-item-lastname">'. $row['lastName'] . '</li>';
    echo '<li class="profile-detail-list-item-address">'. $row['residentialAddress'] . '</li>';
    echo '<li class="profile-detail-list-item-emailaddress">'. $row['emailAddress'] . '</li>';
    echo '<li class="profile-detail-list-item-contactno">'. $row['contactNo'] . '</li>';
    echo '<li class="profile-detail-list-item-companyname">'. $row['companyName'] . '</li>';
    echo '<li class="profile-detail-list-item-regno">'. $row['registrationNo'] . '</li>';
    echo '<li class="profile-detail-list-item-regterritory">'. $row['registrationTerritory'] . '</li>';
    } 
    echo '<script src="update scripts/edit-buttons-profile.js"></script>';
    
}   else {
    echo "There are no records, Create one !";
}

// Close connection
mysqli_close($conn);
?>