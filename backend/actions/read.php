<?php
//Include cors settings
include 'config/cors.php';
//Include database settings
include 'config/db-connection.php';

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
