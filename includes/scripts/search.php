<?php
require_once __DIR__.'/../../lib/database.php';

try {
    $name = null;
    $suburb = null;
    $rating = null;

    if (isset($_POST['name'])) $name = $_POST['name'];
    if (isset($_POST['suburb'])) $suburb = $_POST['suburb'];
    if (isset($_POST['rating'])) $rating = $_POST['rating'];
    // if (isset($_POST['location'])) $price = $_POST['Price'];

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