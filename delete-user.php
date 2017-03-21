<?php ob_start();

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

    if (!empty($_GET['userId'])) {
        if (is_numeric($_GET['userId'])) {
            $userId = $_GET['userId'];
        }
    }

    if (!empty($userId)) {

        require_once('db.php');

        $sql = "DELETE FROM users WHERE userId = :userId";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();

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