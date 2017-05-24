<?php
require_once '../config/mysqlconfig.php';

//echo "Debug: " . $mysql_server_name . " " .  $mysql_username . " " .  $mysql_password . "\n";
$mysql = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_database", $mysql_username, $mysql_password);
$mysql -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>