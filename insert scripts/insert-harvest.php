<?php
$hiveID = $_POST['hiveID'];
$quantity = $_POST['quantity'];
$productType = $_POST['productType'];
$productClass = $_POST['productClass'];
$dateOfHarvest = $_POST['dateOfHarvest'];
$harvestID = 0; 
$productID = 0;

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution for harvest table
$sql = "INSERT INTO harvest (hiveID, quantity, productType, dateOfHarvest) VALUES ('$hiveID', '$quantity', '$productType', '$dateOfHarvest')";
$insert = mysqli_query($conn, $sql);
/*------------------------------------------------------------------------------------------------------------*/

// Attempt insert query execution for product table
$sql2Display = "SELECT * FROM harvest ORDER BY harvestID DESC LIMIT 1";
$display2 = mysqli_query($conn, $sql2Display);

$result2Display = $conn->query($sql2Display);
if (mysqli_num_rows($result2Display) > 0) {
    while($row = mysqli_fetch_assoc($result2Display)) {
        $harvestID = $row['harvestID'];
    }
}
$sql2 = "INSERT INTO product (harvestID, descriptionOfProduct) VALUES ('$harvestID', '$productClass')";
$insert2 = mysqli_query($conn, $sql2);
/*------------------------------------------------------------------------------------------------------------*/


// Attempt insert query execution for honey / nuc / queen tables
$sql3Display = "SELECT * FROM product ORDER BY productID DESC LIMIT 1";
$display3 = mysqli_query($conn, $sql3Display);

$result3Display = $conn->query($sql3Display);
if (mysqli_num_rows($result3Display) > 0) {
    while($row = mysqli_fetch_assoc($result3Display)) {
        $productID = $row['productID'];
    }
}

$batchNo = date('Ym') . $harvestID . $productID;

if ($productType == "Honey") {
    $sql3 = "INSERT INTO honey (batchNo, productID, typeOfHoney) VALUES ('$batchNo', '$productID', '$productClass')";
}

if ($productType == "Nucs") {
    $sql3 = "INSERT INTO nucleus (productID, compositionOfNucleus) VALUES ('$productID', '$productClass')";
}

if ($productType == "Queens") {
    $sql3 = "INSERT INTO queen (productID, queenBeeType) VALUES ('$productID', '$productClass')";
}
$insert3 = mysqli_query($conn, $sql3);
/*------------------------------------------------------------------------------------------------------------*/

// Close connection
mysqli_close($conn);
?>