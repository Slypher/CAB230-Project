<?php
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $id = (isset($query['id']) && $query['id'] != '' ? $query['id'] : null);
    $distance = (isset($query['distance']) && $query['distance'] != '' && $query['distance'] != 'Unknown' ? $query['distance'] : null);

    $stmt = $pdo->prepare('SELECT *, (SELECT avg(rating) FROM reviews WHERE park_id = id GROUP BY park_id) as Rating FROM parks WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch();

    $stmt = $pdo->prepare('SELECT user_id, review_id, email, username, review, rating, date FROM reviews, users WHERE park_id = :id AND id = user_id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $reviews = $stmt->fetchAll();
} catch (PDOException $e) {
echo $e->getMessage();
}
?>