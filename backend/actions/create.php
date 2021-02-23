<?php
//Include cors settings
include 'config/cors.php';
//Include database settings
include 'config/db-connection.php';

$received_data = json_decode(file_get_contents("php://input") ?? $_POST,true);

$location = $received_data["location"];
$name = $received_data["name"];
$model = $received_data["model"];
$manufacturer = $received_data["manufacturer"];
$price = $received_data["price"];
$dateofpurchase = $received_data["dateofpurchase"];
$warrantydate = $received_data["warrantydate"];
$info = $received_data["info"];
$status = $received_data["status"];

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO devices (device_location, device_name, device_model, device_manufacturer, device_price, device_purchase_date, device_warranty_date, device_info, device_status) VALUES (?,?,?,?,?,?,?,?,?)";

$stmt = $connect->prepare($sql);
$stmt->execute([$location, $name, $model, $manufacturer, $price, $dateofpurchase, $warrantydate, $info, $status]);	
$connect = null;
?>
