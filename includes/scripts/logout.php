<?php
if (!isset($_POST['logout'])) return;
unset($_SESSION['user']);
    $url_array = parse_url(($_SERVER['HTTPS'] == 'on' ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $url = $url_array['scheme'].'://'.$url_array['host'];
    $url .= (substr(dirname($url_array['path']), -1) == '\\' || dirname($url_array['path']) == '' ? dirname($url_array['path']) : dirname($url_array['path']).'\\');
    header('Location: '.$url.'index.php');
exit();
?>