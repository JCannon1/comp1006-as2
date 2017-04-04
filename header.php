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
        <li><a href="default.php" class="navbar-brand"><img src="images/logo-creation-site-php-1.jpg"></li>
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
            echo '<li><a href="pages.php">Pages</a></li> <li><a href="logo.php">Logo</a></li> <li><a href="admin-users.php">Public Site</a></li> <li><a href="control-pannel.php">Control Pannel</a></li> <li><a href="logout.php">Logout</a></li>';
        }
        ?>
        <!-- Logo Upload -->
        <!--<title>Upload Page</title>
</head>
<body>
<form method="post" action="save-upload.php" enctype="multipart/form-data">
    <label for"anyFile">Choose a File: </label>
    <input name="anyFile" id="anyFile" type="file" />
    <button>Upload</button>
</form>-->
    </ul>

    <?php
    if (!empty($_SESSION['userId'])) {
        echo '<div class="navbar-text pull-right">' . $_SESSION['username'] . '</div>';
    }
    ?>
</nav>
