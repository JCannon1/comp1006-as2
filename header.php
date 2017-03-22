<?php 
ob_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>

    <!-- minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- bootstrap theme CSS -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>

<nav class="navbar navbar-default">
    <ul class="nav navbar-nav">
        <li><a href="default.php" class="navbar-brand">COMP1006 - Admin Users</a></li>
        <li><a href="admin-users.php">Users</a></li>

        <?php
        // make sure user is logged in
        session_start();

        if (empty($_SESSION['userId'])) {
            echo '<li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>';
        }
        else {
            // logout link
            echo '<li><a href="logout.php">Logout</a></li>';
        }
        ?>
    </ul>

    <?php
    if (!empty($_SESSION['userId'])) {
        echo '<div class="navbar-text pull-right">' . $_SESSION['username'] . '</div>';
    }

</nav>
</body>
</html>