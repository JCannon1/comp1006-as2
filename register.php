<?php 
$pageTitle = 'Sign Up';
require_once ('header.php'); ?>

<!-- registration form -->
<main class="container">
    <h1>New User Registration</h1>
    <!-- edited alert style -->
    <div class="alert alert-primary" id="message">Please create your new account</div>

    <form method="post" action="save-registration.php">
    <fieldset class="form-group">
        <label for="username" class="col-sm-2">Username:</label>
        <input name="username" id="username" required type="email" placeholder="abc123@email.com"  />
    </fieldset>
    <fieldset class="form-group">
        <label for="password" class="col-sm-2">Password:</label>
        <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        <span id="result"></span>
    </fieldset>
    <fieldset class="form-group">
        <label for="confirm" class="col-sm-2">Confirm Password:</label>
        <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
    </fieldset>
    <div class="col-sm-offset-2">
        <!-- edited button style -->
        <button class="btn btn-primary btnRegister">Register</button>
    </div>
    </form>
</main>

<?php require_once('footer.php'); ?>
