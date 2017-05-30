<?php
require_once dirname(__FILE__).'/../config/mysqlconfig.php';

// this file is included whenever a connection to the database is required

// use credentials from mysqlconfig.php
$pdo = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_username", $mysql_username, $mysql_password);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>