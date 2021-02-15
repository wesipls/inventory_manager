<?php
//database variables
$servername = 'db';
$username = "invisman";
$password = "P4ssW0rd";
$dbname = "Inventory";

//Create connection
try {
	$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} 
//Catch errors
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
