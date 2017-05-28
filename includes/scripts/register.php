<?php
if (!isset($_POST['register'])) return;
require_once __DIR__.'/../../lib/database.php';
require_once __DIR__.'/../functions.php';

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

    // $stmt = $pdo->query("SELECT id, Name, Suburb FROM parks WHERE Name LIKE '%$name%'");
    // //$stmt = $pdo->prepare("SELECT id, Name, Suburb FROM parks WHERE Name LIKE '%:name%'");
    // //$stmt->bindValue(':name', $name);
    // //$stmt->execute();
    // $results = $stmt->fetchAll();

    // $toprow = array_shift($results);
    // $toprow['Rating'] = 0;

    // $row = array();
    // $rows = array();
    // $counter = 0;
    // foreach ($results as $result) {
    //     $counter += 1;
    //     $result['Rating'] = 0;
    //     array_push($row, $result);
    //     if ($counter == 3) {
    //         $counter = 0;
    //         array_push($rows, $row);
    //         $row = array();
    //     }
    // }
    // if (!empty($row)) array_push($rows, $row);
    header("Location: http://{$_SERVER['HTTP_HOST']}/index.php?register=true");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>