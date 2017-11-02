<?php
	//$type = $_GET['type'];
	//$value = floatval($_GET['reading']);
//$id = $_GET['id'];
$id = $_GET['car_id'];
$speed = $_GET['speed'];
    $longitude = $_GET['lng'];
    $latitude = $_GET['lat'];
     $altitude = $_GET['alt'];
     $car_id = $_GET['car_id'];
 
	//create a php timestamp and make it mysql compatible
	//date_default_timezone_set("");
	$timestamp = date('Y-m-d H:i:s', time());
 
	$conn = new mysqli("localhost", "root", "", "octs");
	// Check connection
	if (mysqli_connect_errno()) {
		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 
	//$query = "insert into gpsdata values (\"$type\", \"$value\",\"$timestamp\")";
	$query = "insert into car_log values (\"$car_id\", \"$latitude\",\"$longitude\",\"$speed\", \"$altitude\",\"$timestamp\")";
	$result = mysqli_query($conn, $query);
	if(!$result) {
		 echo "Error: " . mysqli_error($conn);
	} else {
		http_response_code(200);
		echo http_response_code() . ": ";
		echo "Data successfully added to db.\n";
	}
?>