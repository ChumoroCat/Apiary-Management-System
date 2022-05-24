<?php
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt display query execution
$sql = "SELECT MONTH(dateOfEntry) as month, ROUND(SUM(revenue),2) AS totalRev, ROUND(SUM(expense),2) totalExp FROM accountBook LEFT JOIN apiarist ON accountBook.apiaristID = apiarist.apiaristID where apiarist.apiaristID = $apiaristID AND Year(dateOfEntry) = '2021' GROUP BY month;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql) === false){
    // echo "Records displayed successfully.";
// } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {

    echo '<table class="w-full mr-24">';
    echo '<thead>';
    echo '<tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">';
    echo '<th class="text-xl px-4 py-3">Month</th>';
    echo '<th class="text-xl px-4 py-3">Revenue</th>';
    echo '<th class="text-xl px-4 py-3">Expense</th>';
    echo '<th class="text-xl px-4 py-3">Profit</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody class="bg-white">';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        echo '<tr class="text-gray-700">';
        
        // convert number to month name 
        $dateObj   = DateTime::createFromFormat('!m', $row['month']);
        $monthName = $dateObj->format('F');

        echo '<td class="text-xl px-4 py-3 border">'. $monthName .'</td>';
        echo '<td class="text-xl px-4 py-3 border text-green-500">'. $row['totalRev'] .'</td>';
        echo '<td class="text-xl px-4 py-3 border text-red-500">'. $row['totalExp'] .'</td>';
        echo '<td class="text-xl px-4 py-3 border text-blue-500">'. $row['totalRev']-$row['totalExp'] .'</td>';
        echo '</tr>';

    } 
    echo '</tbody>';
    echo '</table>';

}


// Close connection
mysqli_close($conn);
?>