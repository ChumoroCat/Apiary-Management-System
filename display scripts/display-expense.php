<?php
session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID and purposeOfExpense <> '';";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="bookkeeping-expense-detail" id="a'. $row['accountBookID'] . '">';
    echo '<p class="bookkeeping-expense-detail-purpose">' . $row['purposeOfExpense'] . '</p>';
    echo '<p class="bookkeeping-expense-detail-amount">' . "$" . $row['expense'] . '</p>';
    echo '<p class="bookkeeping-expense-detail-date">' . $row['dateOfEntry'] . '</p>';
    echo '<div class="buttons">';
    echo '<button class="record_edit" id="'. $row['accountBookID'] . '">Edit</button>';
    echo '<button class="record_delete" id="'. $row['accountBookID'] . '">Delete</button>';
    echo '</div>';
    echo '</div>';
    } 

    $sql2 = "SELECT ROUND(SUM(expense),2) as total FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID and purposeOfExpense <> '';";
    $result2 = $conn->query($sql2);
    
    while($row = mysqli_fetch_assoc($result2)) {
        echo '<div class="total-expense">Total Expense: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$' . $row['total'] . '</div>';
    } 

    // rename the script below for different pages
    echo '<script src="update scripts/edit-buttons-expense.js"></script>';
    // echo '<script src="delete scripts/delete-buttons-accountBook.js"></script>';

    
}   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>