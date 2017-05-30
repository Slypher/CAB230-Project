<?php
require_once __DIR__.'/../functions.php';

session_start();
unset($_SESSION['user']); // delete user account stored in session
header('Location: '.getUrl(3).'index.php'); // redirect
exit();
?>