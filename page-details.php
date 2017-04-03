<?php ob_start();

require_once('auth.php');

$pageTitle = 'Add Page';
require_once ('header.php');

?>

<main class="container">
    <h1>Add New Page</h1>

    <form method="post" action="save-page.php" enctype="multipart/form-data">
        <fieldset class="form-group">
            <label for="title" class="col-sm-1">Title: *</label>
            <input name="title" id="title" required placeholder="Album Title" value="<?php echo $title; ?>" />
        </fieldset>
        <fieldset class="form-group">
            <label for="content" class="col-sm-1">Content: *</label>
            <input name="content" id="content" required placeholder="Page Content" value="<?php echo $content; ?>" />
        </fieldset>

         <input name="contentId" id="contentId" value="<?php echo $contentId; ?>" type="hidden" />
        <button class="btn btn-success col-sm-offset-1">Save</button>
    </form>

</main>

<?php
require_once('footer.php');
ob_flush(); ?>