<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Registration</title>
</head>
<body>

<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$confrim = $_POST['confirm'];
$ok = true;

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

    require_once ('db.php');

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

    $password = password_hash($password, PASSWORD_DEFAULT);

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();

    $conn = null;

    echo 'Registration Saved. <a href="login.php">Login</a>';
}
?>

</body>
</html>