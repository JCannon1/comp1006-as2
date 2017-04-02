<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Registration</title>
</head>
<body>

<?php 
// save user inputs as variables
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// validate the inputs
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

    // connect to database
    require_once ('db.php');

    // SQL insert the inputs
    $sql = "INSERT INTO adminUsers (username, password) VALUES (:username, :password)";

    // hash the password used for registration
    $password = password_hash($password, PASSWORD_DEFAULT);

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();

    // disconnect from the database
    $conn = null;

    echo 'Registration Saved. <a href="login.php">Login</a>';
}
?>

</body>
</html>