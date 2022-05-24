<?php 
    session_start();
    unset($_SESSION["userName"]);
    
    session_destroy();
    header("Location: /AMS/Login?msg=come-back-again");
?>