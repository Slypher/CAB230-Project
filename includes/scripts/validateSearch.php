<?php
if (!isset($_POST['search'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

$name = (isset($_POST['name']) ? $_POST['name'] : null);
$suburb = (isset($_POST['suburb']) && $_POST['suburb'] != 'default' ? $_POST['suburb'] : null);
$rating = (isset($_POST['rating']) ? $_POST['rating'] : null);
$location = (isset($_POST['location']) ? $_POST['location'] : null);

// Check for errors and add error message to array
$errors = array(
    "nameError" => isValidName($name),
    "suburbError" => isValidSuburb($pdo, $suburb),
    "ratingError" => isValidRating($rating),
    "locationError" => isValidLocation($location),
);
foreach ($errors as $error) if ($error) return; // If error is not null, exit
$data = array('name' => $name, 'suburb' => $suburb, 'rating' => $rating, 'location' => $location);
header("Location: http://{$_SERVER['HTTP_HOST']}/results.php?".http_build_query($data));
?>