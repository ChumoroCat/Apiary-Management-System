<?php
$accountBookID = $_POST['accountBookID'];
$expense = $_POST['expense'];
$purposeOfExpense = $_POST['purposeOfExpense'];
$dateOfEntry = $_POST['dateOfEntry'];

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt update query execution
$sql = "UPDATE accountBook SET expense = '$expense', purposeOfExpense = '$purposeOfExpense', dateOfEntry = '$dateOfEntry' WHERE accountBookID = '". $accountBookID ."';";

if(mysqli_query($conn, $sql)){
    echo "Records updated successfully.";
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>