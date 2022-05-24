<?php
session_start();
if(empty($_SESSION["userID"])) {
    header("Location: /AMS/Login?login=session-ended");
} 
// echo 'This is for testing purposes only <br>'; 
// echo 'Your apiaristid is: '. $_SESSION['userID'];
?>