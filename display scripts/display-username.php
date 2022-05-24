<?php
session_start();
$userName = $_POST['userName'];

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT userName FROM apiarist";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if ($userName == $row['userName'])
        {
            echo 'Username already Exists';
        }
    } 
    
}
// else {
//     echo "no names found";
// }

// Close connection
mysqli_close($conn);
?>