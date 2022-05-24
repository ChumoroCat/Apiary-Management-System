<?php

session_start();
$apiaristID = $_SESSION["userID"];
$conn = mysqli_connect("localhost", "root", "", "ams");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT apiaryLocation FROM apiary;
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

	$url = "https://geokeo.com/geocode/v1/search.php?q=".url_encode($row["apiaryLocation"])."&api=YOUR_API_KEY";

	// Call API
	$json = file_get_contents($url);
	$json = json_decode($json);
	if(array_key_exists('status', $json)){
    	    if($json->status == 'ok'){
		$address = $json->results[0]->formatted_address;
		$latitude = $json->results[0]->geometry->location->lat;
		$longitude = $json->results[0]->geometry->location->lng;

		// Update coordinates
		$conn->query("UPDATE apiary SET apiaryLocation = '$address', mapCoordinates = '$lat' . ',' . '$lng';
	    }
	}
    }
}
else{
    echo "0 results";
}
$conn->close();

?>