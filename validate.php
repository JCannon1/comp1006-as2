<?php ob_start();

$username = $_POST['username'];
$password = $_POST['password'];

require_once ('db.php');

$sql = "SELECT userId, password FROM users WHERE username = :username";

$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();

$user = $cmd->fetch();

if (password_verify($password, $user['password'])) {

    session_start();
    $_SESSION['userId'] = $user['userId'];

    $_SESSION['username'] = $username;
    header('location:admin-users.php');
}
else {
    header('location:login.php?invalid=true');
    exit();
}

$conn = null;

ob_flush(); ?>