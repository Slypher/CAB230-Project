<?php
require_once dirname(__FILE__).'/../config/mysqlconfig.php';

//echo "Debug: " . $mysql_server_name . " " .  $mysql_username . " " .  $mysql_password . "\n";
$pdo = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_username", $mysql_username, $mysql_password);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>