<?php
if (!isset($_POST['logout'])) return;
unset($_SESSION['user']);
header("Location: http://{$_SERVER['HTTP_HOST']}/index.php");
exit();
?>