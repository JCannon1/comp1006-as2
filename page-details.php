<?php ob_start();

require_once('auth.php');

$pageTitle = 'Add Page';
require_once ('header.php');

try {
$pageId = null;
$title = null;
$content = null;

if (!empty($_GET['pageId'])) {
    if (is_numeric($_GET['pageId'])) {
        // we have a numeric pageId in the URL
        $pageId = $_GET['pageId'];

        // connect
        require_once ('db.php');

        $sql = "SELECT title, content FROM pages WHERE pageId = :pageId";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();
        $page = $cmd->fetch();

        // populate our page values into variables
        $title = $page['title'];
        $content = $page['content'];

        // disconnect
        $conn = null;
    }
}

?>

<main class="container">
    <h1>Add New Page</h1>

    <form method="post" action="save-page.php" enctype="multipart/form-data">
        <fieldset class="form-group">
            <label for="title" class="col-sm-1">Title: *</label>
            <input name="title" id="title" required placeholder="Title" value="<?php echo $title; ?>" />
        </fieldset>
        <fieldset class="form-group">
            <label for="content" class="col-sm-1">Content: *</label>
            <input name="content" id="content" required placeholder="Page Content" value="<?php echo $content; ?>" />
        </fieldset>

         <input name="pageId" id="pageId" value="<?php echo $pageId; ?>" type="hidden" />
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