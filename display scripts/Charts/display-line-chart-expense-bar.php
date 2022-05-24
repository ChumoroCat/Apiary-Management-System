<?php
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
$value= array(null,null,null);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt display query execution
$sql = "SELECT YEAR(dateOfEntry) as year, ROUND(SUM(expense),2) AS total FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID AND YEAR(dateOfEntry) > 2018 AND YEAR(dateOfEntry) < 2022 GROUP BY year;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
    $value[$row['year']-2019]= $row['total'];
    } 
    echo json_encode($value);

}


// Close connection
mysqli_close($conn);
?>