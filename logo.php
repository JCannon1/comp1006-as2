<?php ob_start();

$pageTitle = 'Upload Logo';
require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Logo</title>
</head>
<body>
<h1>Upload Logo</h1>
<form method="post" action="save-upload.php" enctype="multipart/form-data">
    <label for"anyFile">Choose a Logo: </label>
    <input name="anyFile" id="anyFile" type="file" />
    <button>Upload</button>
</form>

<?php 
if (!empty($logo)) {
    echo '<img src="logos/' . $logo . '" title="Logo Preview" class="col-sm-offset-1"> />';
}
?>

</body>
</html>

<?php require_once('footer.php');
ob_flush(); ?>