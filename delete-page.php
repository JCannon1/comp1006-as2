<?php ob_start();

// use auth.php to do an authorization check
require_once ('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Page...</title>
</head>
<body>

<?php

try {
    $pageId = null;

    // make sure pageId has a numeric value
    if (!empty($_GET['pageId'])) {
        if (is_numeric($_GET['pageId'])) {
            $pageId = $_GET['pageId'];
        }
    }

    if (!empty($pageId)) {

        // connect to database
        require_once('db.php');

        // run the SQL delete command
        $sql = "DELETE FROM pages WHERE pageId = :pageId";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();

        // disconnect from the database
        $conn = null;
    }

    header('location:pages.php');
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