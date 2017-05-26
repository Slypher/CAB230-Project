<?php
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $name = (isset($query['name']) ? $query['name'] : null);
    $suburb = (isset($query['suburb']) ? $query['suburb'] : null);
    $rating = (isset($query['rating']) ? $query['rating'] : null);
    $location = (isset($query['location']) ? $query['location'] : null);

    $stmt = $pdo->query("SELECT id, Name, Suburb FROM parks WHERE Name LIKE '%$name%'");
    //$stmt = $pdo->prepare("SELECT id, Name, Suburb FROM parks WHERE Name LIKE '%:name%'");
    //$stmt->bindValue(':name', $name);
    //$stmt->execute();
    $results = $stmt->fetchAll();

    $toprow = array_shift($results);
    $toprow['Rating'] = 0;

    $row = array();
    $rows = array();
    $counter = 0;
    foreach ($results as $result) {
        $counter += 1;
        $result['Rating'] = 0;
        array_push($row, $result);
        if ($counter == 3) {
            $counter = 0;
            array_push($rows, $row);
            $row = array();
        }
    }
    if (!empty($row)) array_push($rows, $row);
} catch (PDOException $e) {
echo $e->getMessage();
}
?>