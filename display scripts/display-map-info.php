<?php
error_reporting(0);
session_start();
$batchNo = $_POST['batchNo'];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM honey LEFT JOIN product ON honey.productID = product.productID LEFT JOIN harvest ON product.harvestID = harvest.harvestID LEFT JOIN hive on harvest.hiveID = hive.hiveID LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID where honey.batchNo = $batchNo;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo 'Try Again without Letters';
    //"ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<li class="map-info">'. $row['typeOfHoney'] . '</li>';
    echo '<li class="map-info">'. $row['apiaryName'] . '</li>';
    echo '<li class="map-info">'. $row['apiaryLocation'] . '</li>';
    echo '<li class="map-info">'. $row['typeOfHive'] . '</li>';
    echo '<li class="map-info">' . $row['typeOfFlora'] . '</li>';
    echo '<li class="map-info">' . $row['dateOfHarvest'] . '</li>';
    echo '<li class="map-info-coordinates">' . $row['mapCoordinates'] . '</li>';
    } 
    
}   else {
    echo "Nothing Found";
}


// Close connection
mysqli_close($conn);
?>