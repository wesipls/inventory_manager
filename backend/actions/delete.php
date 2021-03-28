<?php
//Include cors settings
include 'config/cors.php';
//Include database settings
include 'config/db-connection.php';

$received_data = json_decode(file_get_contents("php://input") ?? $_POST,true);

?>
