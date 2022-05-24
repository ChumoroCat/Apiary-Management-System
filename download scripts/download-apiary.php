<?php
session_start();
$apiaristID = $_SESSION["userID"];

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM apiary where apiaristID = '$apiaristID'";
$result = $conn->query($sql);

$dataArray = array();

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $dataArray[$row['apiaristID']][] = $row;
   
    } 
    
}   else {

    header("Location: /AMS/Apiary?record=none");
    echo "There is no data";
    die();
    exit;
}

foreach($dataArray as $id => $line)
{
    // Open the file for writing, blanking existing file or creating if non-existent - name it after the order_id
    $file = fopen('../reports/apiary.csv', 'w');

    $headers = array('Apiary ID','Apiary Name','Location','Map Coordinates','Type of Flora','No of Hives','Date Created','Apiarist ID');
    fputcsv($file, $headers);

    // Loop through each $row for that particular order_id and put it into the csv
    foreach($line as $entry)
    {
        fputcsv($file, $entry);
    }

    fclose($file);
}

header("Location: ../reports/apiary.csv");
// Close connection
mysqli_close($conn);
?>