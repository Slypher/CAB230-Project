<?php
if (!isset($_POST['review'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';
try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $park_id = (isset($query['id']) && $query['id'] != '' ? $query['id'] : null);
    $user_id = (isset($_POST['user_id']) && $_POST['user_id'] != '' ? $_POST['user_id'] : null);
    $review = (isset($_POST['review-text']) && $_POST['review-text'] != '' ? $_POST['review-text'] : null);
    $rating = (isset($_POST['rating']) && $_POST['rating'] != '' ? $_POST['rating'] : null);

    $stmt = $pdo->prepare('INSERT INTO reviews (user_id, park_id, review, rating, date) VALUES (:user_id, :park_id, :review, :rating, :date)');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':park_id', $park_id);
    $stmt->bindValue(':review', htmlspecialchars($review));
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':date', date('Y-m-d'));
    $stmt->execute();
} catch (PDOException $e) {
echo $e->getMessage();
}
?>