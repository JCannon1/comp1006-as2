<?php ob_start();

$pageTitle = 'Admin Users List';
require_once('header.php'); ?>

<h1>Admin Users</h1>

<?php

session_start();

if (!empty($_SESSION['userId'])) {
    echo '<a href="user-details.php">Add a New User</a> ';
}

try {
    require_once('db.php');

    $sql = "SELECT userId, username, password FROM users ORDER BY username";

    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $albums = $cmd->fetchAll();

    echo '<table class="table table-striped table-hover">
    <tr><th>Username</th> //<th>Password</th>';

    if (!empty($_SESSION['userId'])) {
        echo '<th>Edit</th><th>Delete</th>';
    }

    echo '</tr>';

    foreach ($users as $user) {
        echo '<tr><td>' . $user['username'] . '</td>
            <td>' . $user['password'] . '</td>
            <td>';
            }
        echo '</td>';

        if (!empty($_SESSION['userId'])) {
            echo '<td><a href="user-details.php?userId=' . $user
            ['userId'] . '" class="btn btn-primary">Edit</a></td>
            <td><a href="delete-user.php?userId=' . $user['userId'] 
            . '"
            class="btn btn-danger confirmation">Delete</a></td>';
        }

        echo '</tr>';
    }

    echo '</table>';

    $conn =null;
}
catch (exception $e) {
    mail('jessecannon1@hotmail.com', 'User Page Error', $e);
    header('location:error.php');
}
?>

<?php require_once('footer.php');
ob_flush(); ?>