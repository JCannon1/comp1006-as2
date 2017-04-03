<?php ob_start();

require_once('auth.php');

$pageTitle = 'User Details';
require_once ('header.php');

try {
$userId = null;
$username = null;

if (!empty($_GET['userId'])) {
    if (is_numeric($_GET['userId'])) {
        $userId = $_GET['userId'];

        // connect to database
        require_once ('../db.php');

        $sql = "SELECT userId, username FROM adminusers WHERE userId = :userId";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();
        $album = $cmd->fetch();

        // change the user values into variables 
        $userId = $user['userId'];
        $username = $user['username'];

        // disconnect from the database
        $conn = null;
    }
}

?>
<!-- user details form -->
<main class="container">
    <h1>User Details</h1>

    <form method="post" action="save-user.php" enctype="multipart/form-data">
        <fieldset class="form-group">
            <label for="userId" class="col-sm-1">User Id: *</label>
            <input name="userId" id="userId" required placeholder="User Id" value="<?php echo $userId; ?>" />
        </fieldset>
        <fieldset class="form-group">
            <label for="username" class="col-sm-1">Year:</label>
            <input name="username" id="username"  placeholder="Release Year" value="<?php echo $username; ?>" />
        </fieldset>

        <input name="userId" id="userId" value="<?php echo $userId; ?>" type="hidden" />
        <button class="btn btn-success col-sm-offset-1">Save</button>
    </form>
</main>

<?php
}
catch (exception $e) {
    header('location:error.php');
}
require_once('footer.php');
ob_flush(); ?>