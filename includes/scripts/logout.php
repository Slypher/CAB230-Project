<?php
require_once __DIR__.'/../functions.php';
session_start();
unset($_SESSION['user']);
    header('Location: '.getUrl(3).'index.php');
exit();
?>