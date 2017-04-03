<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Registration</title>
</head>
<body>

<?php
// save user inputs to variables
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// validate inputs
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (empty($password) || (strlen($password) < 8)) {
    echo 'Password is invalid<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords do not match<br />';
    $ok = false;
}

if ($ok) {

    // connect to my database
    require_once ('../db.php');

    // set up sql insert
    $sql = "INSERT INTO adminusers (username, password) VALUES (:username, :password)";

    // hash the user password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // execute the save
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();

    // disconnect from my database
    $conn = null;

    echo 'Registration Saved. <a href="login.php">Login</a>';
}
?>
</body>
</html>
