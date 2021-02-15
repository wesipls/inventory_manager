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
$servername = 'db';
$username = "invisman";
$password = "P4ssW0rd";
$dbname = "Inventory";

//Create connection
$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//fetch data
$received_data = json_decode(file_get_contents("php://input") ?? $_POST);

//Create array for result

$data = array();

if($received_data->query != '')
{
	$query = "
	SELECT * FROM devices 
	WHERE device_id LIKE '%".$received_data->query."%' 
	OR device_location LIKE '%".$received_data->query."%'
	OR device_name LIKE '%".$received_data->query."%'
	OR device_model LIKE '%".$received_data->query."%'
	OR device_manufacturer LIKE '%".$received_data->query."%'
	OR device_price LIKE '%".$received_data->query."%'
	OR device_purchase_date LIKE '%".$received_data->query."%'
	OR device_warranty_date LIKE '%".$received_data->query."%'
	OR device_info LIKE '%".$received_data->query."%'
	OR device_status LIKE '%".$received_data->query."%'
	ORDER BY device_id DESC
	";
}
else
{
	$query = "
	SELECT * FROM devices
	ORDER BY device_id DESC
	";
}

$statement = $connect->prepare($query);

$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$data[] = $row;
}

//Echo json array
echo json_encode($data);
$connect = null;
?>
