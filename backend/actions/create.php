<?php
//Include cors settings
include 'config/cors.php';
//Include database settings
include 'config/db-connection.php';

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO devices (device_location, device_name, device_model, device_manufacturer, device_price, device_purchase_date, device_warranty_date, device_info, device_status) VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = $connect->prepare($sql);
$received_data = json_decode(file_get_contents("php://input") ?? $_POST,true);

$connect->beginTransaction();

for ($i=0; $i< count($received_data); $i++)
{
$location = $received_data[$i]["location"];
$name = $received_data[$i]["name"];
$model = $received_data[$i]["model"];
$manufacturer = $received_data[$i]["manufacturer"];
$price = $received_data[$i]["price"];
$dateofpurchase = $received_data[$i]["dateofpurchase"];
$warrantydate = $received_data[$i]["warrantydate"];
$info = $received_data[$i]["info"];
$status = $received_data[$i]["status"];

$stmt->execute([$location, $name, $model, $manufacturer, $price, $dateofpurchase, $warrantydate, $info, $status]);	
}

$connect->commit();

$connect = null;
?>
