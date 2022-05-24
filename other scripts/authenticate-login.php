<?php
// Initialize the session
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
// $hashPassword = password_hash($password, PASSWORD_DEFAULT);

$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt query execution
$sql = "SELECT * FROM apiarist WHERE userName = '$username';";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $valid = password_verify($password, $row['password']);
  
    // If password matches
    if($valid) {
      if(password_needs_rehash ($hashPassword, PASSWORD_DEFAULT) ) {
        $newHash = password_hash($password, PASSWORD_DEFAULT);
      }

      //Create a session
      $_SESSION['valid'] = true;
      $_SESSION['timeStart'] = time();
      $_SESSION['userID'] = $row['apiaristID'];
      
      // Redirect to inspection page
      header("Location: /AMS/profile");
      die();
      exit;

    } else {
      header("Location: /AMS/Login?login=failed");
      die();
      exit;
    }
  }
} else {
  header("Location: /AMS/Login?login=failed");
  die();
  exit;
}



?>