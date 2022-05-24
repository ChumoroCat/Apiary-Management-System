<?php
$conn = mysqli_connect("localhost", "root", "", "ams");
$apiaristID = $_SESSION["userID"];

date_default_timezone_set('Australia/Perth');

// $to_email = "limyilewis@hotmail.com";
// $subject = "Inspection Reminder";
$headers = "From: AMS V2 System";

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt display query execution
$sql = "SELECT * FROM inspection 
        LEFT JOIN hive ON inspection.hiveID = hive.hiveID
        LEFT JOIN apiary ON hive.apiaryID = apiary.apiaryID
        LEFT JOIN apiarist ON apiary.apiaristID = apiarist.apiaristID
        WHERE completionStatus = 'Pending'
        AND apiarist.apiaristID = '$apiaristID' ";
        $result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        // If record date is later than today's date
        if ((strtotime($row['actualInspectionDate']) - strtotime(date("Y-m-d")) <= 0) && $row['actualInspectionDate'] = "Pending" ) {
           
            $inspectionID = $row['inspectionID'];
            
            $sql2 = "UPDATE inspection SET completionStatus = 'Warning Sent' WHERE inspectionID = '$inspectionID';";
            $result2 = $conn->query($sql2);
            $body = "Hi " . $row['firstName'] . ",\n\nThis is a warning that your inspection for " . $row['typeOfHive']. " has passed the due date. \nPlease complete your inspection as soon as possible. Thank you\n\n\nCute Regards, \nPT-06 \nYour Cute Team
                    \n\nPlease do not reply to this email. This is a computer generated message.";

            mail($row['emailAddress'],"Inspection Warning", $body, $headers);
        } else         

        // If record date is within 7 days from today 
        if ((strtotime($row['actualInspectionDate']) - strtotime(date("Y-m-d")))/86400 <= 7) {

            $inspectionID = $row['inspectionID'];
            
            $sql3 = "UPDATE inspection SET completionStatus = 'Reminder Sent' WHERE inspectionID = '$inspectionID';";
            $result3 = $conn->query($sql3);
            $body = "Hi " . $row['firstName'] . ",\n\nThis is a gentle reminder that your inspection for " . $row['typeOfHive']. " is due soon. \nThank you\n\n\nCute Regards, \nPT-06 \nYour Cute Team
                    \n\nPlease do not reply to this email. This is a computer generated message.";

            mail($row['emailAddress'],"Inspection Reminder", $body, $headers);
        } 
    }
} 

// Close connection
mysqli_close($conn);
?>