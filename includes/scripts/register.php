<?php
if (!isset($_POST['register'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

// this file attempts to register the user, adding their details to the database,
// while also validating the details, checking for an existing user,
// then hashing the password and finally inserting the details into the database

try {
    $email = (isset($_POST['email']) ? $_POST['email'] : null);
    $username = (isset($_POST['username']) ? $_POST['username'] : null);
    $password = (isset($_POST['password']) ? $_POST['password'] : null);
    $birth = (isset($_POST['birth']) ? $_POST['birth'] : null);
    $gender = (isset($_POST['gender']) ? $_POST['gender'] : null);
    $agree = (isset($_POST['agree']) ? $_POST['agree'] : null);

    // Check for errors and add error message to array
    $errors = array(
        "emailError" => isValidEmail($email),
        "usernameError" => isValidUsername($username),
        "passwordError" => isValidPassword($password),
        "birthError" => isValidBirth($birth),
        "genderError" => isValidGender($gender),
        "agreeError" => isValidAgree($agree)
    );
    foreach ($errors as $error) if ($error) return; // If error is not null, exit

    // check if the user is using details that already exist
    $stmt = $pdo->prepare("SELECT email, username FROM users WHERE email = :email OR username = :username");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $result) { // add errors to array
        if ($result['email'] == $email) array_push($errors, 'Email already in use');
        if ($result['username'] == $username) array_push($errors, 'Username already in use');
    }
    foreach ($errors as $error) if ($error) return; // if error is not null, exit

    $hashed_password = hash('sha256', $password.$username); // hash password with sha256

    // add the user to the database
    $stmt = $pdo->prepare("INSERT INTO users (email, username, salt, password, birth, gender) VALUES (:email, :username, :salt, :password, :birth, :gender)");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':salt', $username);
    $stmt->bindValue(':password', $hashed_password);
    $stmt->bindValue(':birth', $birth);
    $stmt->bindValue(':gender', $gender);
    $stmt->execute();
    header('Location: '.getUrl().'index.php?register=true'); // redirect
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>