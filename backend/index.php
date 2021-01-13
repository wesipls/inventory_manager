<?php
//THIS IS PROBABLY REALLY UNSAFE, FIX FOR PROD DEPLOYMENT
function cors() {
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");

        exit(0);
    }
}
cors();
//NOTE: FIX ABOVE CODE

//define DB variables
$servername = "localhost";
$username = "invisman";
$password = "P4ssW0rd";
$dbname = "Inventory";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Error " .mysqli_error($conn));

//fetch data
$sql = "SELECT * FROM laptops";
$result = mysqli_query($conn, $sql) or die("Error in SELECT " . mysqli_error($conn));

//Create array for result
$arr = array();
while($row = mysqli_fetch_assoc($result))
{
	$arr[] = $row;
}
//Echo json array
echo json_encode($arr);

//Close db connection
mysqli_close($conn);
?> 
