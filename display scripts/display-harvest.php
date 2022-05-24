<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM product LEFT JOIN harvest ON product.harvestID = harvest.harvestID LEFT JOIN hive ON harvest.hiveID = hive.hiveID LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="harvest-record-detail" id="a'. $row['harvestID'] . '">';
    echo '<p class="harvest-record-detail-hive">' . $row['typeOfHive'] . '</p>';
    echo '<p class="harvest-record-detail-product">'. $row['productType'] . '</p>';
    echo '<p class="harvest-record-detail-product">'. $row['descriptionOfProduct'] . '</p>';
    echo '<p class="harvest-record-detail-quantity">'. $row['quantity'] . '</p>';
    echo '<p class="harvest-record-detail-date">'. $row['dateOfHarvest'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit" id="'. $row['harvestID'] . '">Edit</button>';
    echo '<button class="record_delete" id="'. $row['harvestID'] . '">Delete</button>';
    echo '<button class="record_sell" id="'. $row['productID'] . '">Sell</button>';
    echo '</div>';
    echo '</div>';
    } 
    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-harvest.js"></script>';
    echo '<script src="delete scripts/delete-buttons-harvest.js"></script>';
    echo '<script src="insert scripts/sell-buttons-harvest.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>