<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM honey 
        LEFT JOIN product ON honey.productID = product.productID 
        LEFT JOIN harvest ON product.harvestID = harvest.harvestID 
        LEFT JOIN hive ON harvest.hiveID = hive.hiveID 
        LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID
        WHERE apiaristID = $apiaristID;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="batch-record-detail" id="a'. $row['productID'] . '">';
    echo '<p class="batch-record-detail-product">' . $row['typeOfHoney'] . '</p>';
    echo '<p class="batch-record-detail-flora">' . $row['typeOfFlora'] . '</p>';
    echo '<p class="batch-record-detail-batch">' . $row['batchNo'] . '</p>';
    echo '<p class="batch-record-detail-date">' . $row['dateOfHarvest'] . '</p>';
    echo '</div>';
    } 

}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>