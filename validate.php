<?php ob_start();

$username = $_POST['username'];
$password = $_POST['password'];

// connect to database
require_once ('db.php');

// use sql select to get the right username
$sql = "SELECT userId, password FROM adminUsers WHERE username = :username";

$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();

$user = $cmd->fetch();

if (password_verify($password, $user['password'])) {
    // user is found
    session_start();
    $_SESSION['userId'] = $user['userId']; // put the user's id in a session variable
    $_SESSION['username'] = $username;
    header('location:admin-users.php'); // send user to admin-users.php once authenticated
}
else {
    header('location:login.php?invalid=true');
    exit();
}

$conn = null;

ob_flush(); ?>