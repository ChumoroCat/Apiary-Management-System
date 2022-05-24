<!-- This Script displays the list of apiary names in the Create Hive / Create Harvest Form -->
<?php
$apiaristID = $_SESSION["userID"];

$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM hive LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID where apiarist.apiaristID = '$apiaristID'";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'. $row['hiveID'] . '">'. $row['typeOfHive'] . '</option>';
    } 
    
}   else {
    echo "There are no records, Create one !";
}

// Close connection
mysqli_close($conn);
?>