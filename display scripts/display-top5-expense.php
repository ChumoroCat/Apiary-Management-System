<?php
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT purposeOfExpense, ROUND(SUM(expense),2) AS total FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID and purposeOfExpense <> '' GROUP BY purposeOfExpense ORDER BY total DESC LIMIT 5;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {

    echo '<ul class="finance-details-top-5-expense_list">';

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    echo '<li>' . $row['purposeOfExpense'] . ' - $' . $row['total'] . '</li>';

    } 
    echo '</ul>';

    
}
   else {
    echo "There are no records, Create one !";
}


// Close connection
mysqli_close($conn);
?>