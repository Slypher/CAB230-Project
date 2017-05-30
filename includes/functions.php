<?php
/* login.php isValid functions */
function isValidEmail($email) {
    if ($email == null || $email == '') return 'Please <strong>enter an email address</strong>';
    $splitWithAt = explode('@', $email);
    if (count($splitWithAt) != 2) return 'Please enter a <strong> valid email address</strong>';
    $splitWithDot = explode('.', $email);
    if (count($splitWithDot) < 2 || strlen($splitWithDot[1]) == 0) return 'Please enter a <strong> valid email address</strong>';
    return null;
}
function isValidPassword($password) {
    if (strlen($password) < 5) return 'Please choose a password with <strong>5 or more</strong> characters';
    if (strlen($password) > 22) return 'Please choose a password with <strong>22 or fewer</strong> characters';
    if (strlen(preg_replace('/[^0-9]/','',$password)) < 2) return 'Please choose a password with <strong>2 or more</strong> numbers';
}

/* registration.php isValid functions */
function isValidUsername($username) {
    if ($username == null || $username == '' || strlen($username) < 5) return 'Please choose a username with <strong>5 or more</strong> characters';
    if (strlen($username) > 16) return 'Please choose a username with <strong>16 or fewer</strong> characters';
    return null;
}
function isValidBirth($birth) {
    if ($birth == null || $birth == '' || $birth == ' ') return 'Please <strong>select a date of birth</strong>';
    if ((int)$birth >= 2010) return 'Please select a date of birth <strong>before 2010</strong>';
    if ((int)$birth < 1917) return 'Please select a date of birth <strong>after 1917</strong>';
    return null;
}
function isValidGender($gender) {
    if ($gender == null || $gender == '' || !($gender == 'male' || $gender == 'female' || $gender == 'other')) return 'Please <strong>select a gender</strong>';
    return null;
}
function isValidAgree($agree) {
    if ($agree == null || $agree == '' || $agree == 'false') return 'You must agree to our <strong>Terms and Conditions</strong>';
    return null;
}

/* search.php isValid functions */
function isValidName($name) {
    return null;
}
function isValidSuburb($pdo, $suburb) {
    if ($suburb == null || $suburb == '' || $suburb == 'default') return null;
    $stmt = $pdo->prepare("SELECT DISTINCT Suburb FROM parks WHERE Suburb = :suburb");
    $stmt->bindValue(':suburb', $suburb, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (count($results) < 1) return 'Suburb does not exist';
    return null;
}
function isValidRating($rating) {
    if ($rating == null || $rating == "") return null;
    if ($rating > 5 || $rating < 1) return 'Please choose a park rating between <strong>1 and 5</strong>';
    return null;
}
function isValidDistance($distance) {
    if ($distance != null && $distance != '' && !is_numeric($distance)) return 'Distance must be a <strong>number</strong>';
    return null;
}
function isValidLocationLat($location_lat) {
    if ($location_lat != null && $location_lat != '' && !is_numeric($location_lat)) return 'Location Latitude must be a <strong>number</strong>';
    return null;
}
function isValidLocationLong($location_long) {
    if ($location_long != null && $location_long != '' && !is_numeric($location_long)) return 'Location Longitude must be a <strong>number</strong>';
    return null;
}

/* item.php isValid functions */
function isValidUserId($user_id) {
    if ($user_id == null || $user_id == '' || !is_numeric($user_id)) return 'User Id is invalid';
    return null;
}
function isValidParkId($park_id) {
    if ($park_id == null || $park_id == '' || !is_numeric($park_id)) return 'Park Id is invalid';
    return null;
}
function isValidReview($review) {
    if ($review == null || $review == '') return 'Please provide a <strong>review</strong>';
    if (strlen($review) > 255) return 'Review cannot be more than <strong>255 characters</strong>';
    return null;
}
function isValidReviewRating($rating) {
    if ($rating == null || $rating == "" || $rating > 5 || $rating < 1) return 'Please choose a park rating between <strong>1 and 5</strong>';
    return null;
}

/* search.php list of distinct suburbs */
function echoSuburbs($pdo) {
    $results = $pdo->query('SELECT DISTINCT Suburb FROM parks')->fetchAll();
    foreach ($results as $result) echo '<option value="'.$result['Suburb'].'">'.$result['Suburb'].'</option>';
}

/* search.php distance calculator */
function calcDistance($lat1, $long1, $lat2, $long2) {
    $R = 6371e3; // metres
    $lat1Rad = deg2rad($lat1);
    $lat2Rad = deg2rad($lat2);
    $deltaLat = deg2rad($lat2-$lat1);
    $deltaLong = deg2rad($long2-$long1);

    $a = sin($deltaLat/2) * sin($deltaLat/2) +
            cos($lat1Rad) * cos($lat2Rad) *
            sin($deltaLong/2) * sin($deltaLong/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));

    $d = $R * $c;
    return $d;
}

/* login.php, registration.php, search.php error checker */
function anyErrors($errors) {
    foreach ($errors as $error) if ($error) return true;
    return false;
}

/* get the correct url, can also specify how many directories below to return */
/* e.g
 * INPUT: $levels = 3, (CURRENT URL) = fastapps04/n9467211/includes/scripts/filename.php
 * OUTPUT: fastapps04/n9467211/
 * defaults to 1 (no directories below)
 */
function getUrl($levels = 1) {
    $url_array = parse_url(($_SERVER['HTTPS'] == 'on' ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']);
    $url = $url_array['scheme'].'://'.$url_array['host'];
    $url .= (substr(dirname($url_array['path'], $levels), -1) == '\\' || dirname($url_array['path'], $levels) == '' ? dirname($url_array['path'], $levels) : dirname($url_array['path'], $levels).'\\');
    return $url;
}
?>