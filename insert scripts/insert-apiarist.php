<?php
$companyName = $_POST['companyName'];
$registrationNo = $_POST['registrationNo'];
$registrationTerritory = $_POST['registrationTerritory'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$residentialAddress = $_POST['residentialAddress'];
$emailAddress = $_POST['emailAddress'];
$contactNo = $_POST['contactNo'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$hashPassword = password_hash($password, PASSWORD_DEFAULT);


$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/*Check for duplicate username
$dup = mysqli_query("SELECT userName FROM apiarist WHERE userName = '".$_POST['userName']."'");
if(mysqli_num_rows($dup) > 0){
    echo "Username exists";
}
else{*/

// Attempt insert query execution
$sql = "INSERT INTO apiarist (companyName, registrationNo, registrationTerritory, firstName, lastName, residentialAddress, emailAddress, contactNo, userName, password)
VALUES ('$companyName', '$registrationNo', '$registrationTerritory', '$firstName', '$lastName', '$residentialAddress', '$emailAddress', '$contactNo', '$userName', '$hashPassword')";
//}

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}


// Close connection
mysqli_close($conn);
?>