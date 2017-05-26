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
function isValidLocation($location) {
    return null;
}

/* search.php list of distinct suburbs */
function echoSuburbs($pdo) {
    $results = $pdo->query('SELECT DISTINCT Suburb FROM parks')->fetchAll();
    foreach ($results as $result) echo '<option value="'.$result['Suburb'].'">'.$result['Suburb'].'</option>';
}

/* login.php, registration.php, search.php error checker */
function anyErrors($errors) {
    foreach ($errors as $error) if ($error) return true;
    return false;
}
?>