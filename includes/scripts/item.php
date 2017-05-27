<?php
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $name = (isset($query['name']) && $query['name'] != '' ? $query['name'] : null);
    
} catch (PDOException $e) {
echo $e->getMessage();
}
?>