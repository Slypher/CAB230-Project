<?php
if (!isset($_POST['login'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

try {
    $email = (isset($_POST['email']) ? $_POST['email'] : null);
    $password = (isset($_POST['password']) ? $_POST['password'] : null);

    // Check for errors and add error message to array
    $errors = array();
    foreach ($errors as $error) if ($error) return; // If error is not null, exit

    $stmt = $pdo->prepare("SELECT id, email, username, salt, password, birth, gender FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (isset($results[0]) && $results[0]['email'] == $email) $account = $results[0];
    else return array_push($errors, 'Email does not exist');

    if ($account['password'] != hash('sha256', $password.$account['username'])) return array_push($errors, 'Password is incorrect');

    //$session_start();
    $_SESSION['user'] = $account;
    header("Location: http://{$_SERVER['HTTP_HOST']}/index.php?login=true");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>