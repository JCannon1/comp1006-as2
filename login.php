<?php 
$pageTitle = 'Login';
require_once ('header.php'); ?>

<main class="container">
    <h1>Log In</h1>

    <!-- login validation -->
    <!-- edited alert style -->
    <?php 
    if ($_GET['invalid'] == true) {
        echo '<div class="alert alert-danger" id="message">Invalid Login</div>';
    }
    else {
        echo '<div class="alert alert-primary" id="message">Please log in your account below</div>';
    }
    ?>

    <!-- login form -->
    <form method="post" action="validate.php">
    <fieldset class="form-group">
        <label for="username" class="col-sm-2">Username:</label>
        <input name="username" id="username" required type="email" placeholder="abc123@email.com" />
    </fieldset>
    <fieldset class="form-group">
        <label for="password" class="col-sm-2">Password:</label>
        <input type="password" name="password" required />
    </fieldset>
    <fieldset class="col-sm-offset-2">
        <button class="btn btn-primary">Login</button>
    </fieldset>
    </form>
</main>

<?php require_once('footer.php'); ?>