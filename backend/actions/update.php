<?php
//Include cors settings
include 'config/cors.php';
//Include database settings
include 'config/db-connection.php';

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE devices SET device_location=?, device_name=?, device_model=?, device_manufacturer=?, device_price=?, device_purchase_date=?, device_warranty_date=?, device_info=?, device_status=? WHERE device_id=?";
$stmt = $connect->prepare($sql);
$received_data = json_decode(file_get_contents("php://input") ?? $_POST,true);

for ($i=0; $i< count($received_data); $i++)
{
$id = $received_data[$i]["device_id"];
$location = $received_data[$i]["device_location"];
$name = $received_data[$i]["device_name"];
$model = $received_data[$i]["device_model"];
$manufacturer = $received_data[$i]["device_manufacturer"];
$price = $received_data[$i]["device_price"];
$dateofpurchase = $received_data[$i]["device_dateofpurchase"];
$warrantydate = $received_data[$i]["device_warrantydate"];
$info = $received_data[$i]["device_info"];
$status = $received_data[$i]["device_status"];

$stmt->execute([$location, $name, $model, $manufacturer, $price, $dateofpurchase, $warrantydate, $info, $status, $id]);	
}
$connect = null;
?>
