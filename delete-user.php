<?php ob_start();

// use auth.php to do an authorization check
require_once ('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting User...</title>
</head>
<body>

<?php

try {
    $userId = null;

    // make sure userId has a numeric value
    if (!empty($_GET['userId'])) {
        if (is_numeric($_GET['userId'])) {
            $userId = $_GET['userId'];
        }
    }

    if (!empty($userId)) {

        // connect to database
        require_once('../db.php');

        // run the SQL delete command
        $sql = "DELETE FROM adminusers WHERE userId = :userId";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();

        // disconnect from the database
        $conn = null;
    }

    header('location:admin-users.php');
}
catch (exception $e) {
    header('location:error.php');
}
?>

</body>
</html>

<?php
ob_flush();
?>