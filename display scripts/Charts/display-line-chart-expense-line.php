<?php
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
$value= array(null,null,null,null,null,null,null,null,null,null,null,null);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt display query execution
$sql = "SELECT MONTH(dateOfEntry) as month, ROUND(SUM(expense),2) AS total FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID AND Year(dateOfEntry) = '2021' GROUP BY month;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
    $value[$row['month']-1]= $row['total'];
    } 
    echo json_encode($value);

}


// Close connection
mysqli_close($conn);
?>