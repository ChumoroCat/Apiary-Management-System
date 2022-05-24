<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM product LEFT JOIN accountBook ON product.productID = accountBook.productID LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where accountBook.apiaristID = $apiaristID;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="bookkeeping-revenue-detail" id="a'. $row['accountBookID'] . '">';
    echo '<p class="bookkeeping-revenue-detail-product">' . $row['descriptionOfProduct'] . '</p>';
    echo '<p class="bookkeeping-revenue-detail-amount">' . "$" . $row['revenue'] . '</p>';
    echo '<p class="bookkeeping-revenue-detail-date">' . $row['dateOfEntry'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit-revenue" id="'. $row['accountBookID'] . '">Edit</button>';
    echo '<button class="record_delete" id="'. $row['accountBookID'] . '">Delete</button>';
    echo '</div>';
    echo '</div>';
    } 

    $sql2 = "SELECT ROUND(SUM(revenue),2) as total FROM product LEFT JOIN accountBook ON product.productID = accountBook.productID LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where accountBook.apiaristID = $apiaristID;";
    $result2 = $conn->query($sql2);
    
    while($row = mysqli_fetch_assoc($result2)) {
        echo '<div class="total-revenue">Total Revenue: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$' . $row['total'] . '</div>';
    } 

    // rename the script below for different pages
}   else {
    echo "There are no records, Create one !";
}

echo '<script src="update scripts/edit-buttons-revenue.js"></script>';
echo '<script src="delete scripts/delete-buttons-accountBook.js"></script>';

// Close connection
mysqli_close($conn);
?>