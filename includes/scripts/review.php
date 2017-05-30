<?php
if (!isset($_POST['review'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';
try {
    parse_str($_SERVER['QUERY_STRING'], $query);
    $park_id = (isset($query['id']) && $query['id'] != '' ? $query['id'] : null);
    $user_id = (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != '' ? $_SESSION['user']['id'] : null);
    $review = (isset($_POST['review-text']) && $_POST['review-text'] != '' ? $_POST['review-text'] : null);
    $rating = (isset($_POST['rating']) && $_POST['rating'] != '' ? $_POST['rating'] : null);

    // Check for errors and add error message to array
    $errors = array(
        "userIdError" => isValidUserId($user_id),
        "parkIdError" => isValidParkId($park_id),
        "reviewError" => isValidReview($review),
        "ratingError" => isValidReviewRating($rating),
    );
    foreach ($errors as $error) if ($error) return; // If error is not null, exit

    $stmt = $pdo->prepare('INSERT INTO reviews (user_id, park_id, review, rating, date) VALUES (:user_id, :park_id, :review, :rating, :date)');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':park_id', $park_id);
    $stmt->bindValue(':review', htmlspecialchars($review));
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':date', date('Y-m-d'));
    $stmt->execute();

    $url = getUrl();
    header('Location: '.$url.'item.php?id='.$id);
    if (isset($distance)) $url .= '&distance='.$distance;
    header($url);
    exit();
} catch (PDOException $e) {
echo $e->getMessage();
}
?>