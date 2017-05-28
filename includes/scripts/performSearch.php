<?php
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $name = (isset($query['name']) && $query['name'] != '' ? $query['name'] : null);
    $suburb = (isset($query['suburb']) && $query['suburb'] != '' ? $query['suburb'] : null);
    $rating = (isset($query['rating']) && $query['rating'] != '' ? $query['rating'] : null);
    $distance = (isset($query['distance']) && $query['distance'] != '' ? $query['distance'] : null);
    $location_lat = (isset($query['location-lat']) && $query['location-lat'] != '' ? $query['location-lat'] : null);
    $location_long = (isset($query['location-long']) && $query['location-long'] != '' ? $query['location-long'] : null);

    $sql = "SELECT id, Name, Street, Suburb, Latitude, Longitude, (SELECT avg(rating) FROM reviews WHERE park_id = id GROUP BY park_id) as Rating FROM parks";

    $sql_append = array();
    if ($name) array_push($sql_append, "Name LIKE :name");
    if ($suburb) array_push($sql_append, "Suburb = :suburb");
    if ($rating) array_push($sql_append, "(SELECT avg(rating) FROM reviews WHERE park_id = id GROUP BY park_id) BETWEEN :rating_min AND :rating_max");
    
    if (count($sql_append) > 0) $sql .= " WHERE ".array_shift($sql_append);
    foreach ($sql_append as $clause) $sql .= " AND ".$clause;

    $stmt = $pdo->prepare($sql);
    if ($name) $stmt->bindValue(':name', '%'.$name.'%');
    if ($suburb) $stmt->bindValue(':suburb', $suburb);
    if ($rating) $stmt->bindValue(':rating_min', $rating - 0.5);
    if ($rating) $stmt->bindValue(':rating_max', $rating + 0.5);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $key => $result) {
        if ($location_lat && $location_long) {
            $park_distance = calcDistance($location_lat, $location_long, $result['Latitude'], $result['Longitude']) / 1000;
            if ($distance && ($park_distance > $distance)) {
                unset($results[$key]);
                continue;
            } else $results[$key]['Distance'] = substr($park_distance, 0, strpos($park_distance, '.')).substr($park_distance, strpos($park_distance, '.'), 2).' km';
        } else $results[$key]['Distance'] = '';
        if ($result['Rating'] != null && $result['Rating'] != '') $results[$key]['Rating'] = substr($results[$key]['Rating'], 0, 3);
    }
} catch (PDOException $e) {
echo $e->getMessage();
}
?>