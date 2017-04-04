<?php ob_start();

$pageTitle = 'Upload Logo';
require_once('header.php'); ?>

<?php 
if (file_exists("images/" . $_FILES["file"]["name"]))
    {
    $_FILES["file"]["name"] . " File name already exists. ";
    }
else {
    move_uploaded_file($_FILES["file"]["tmp_name"],
    "images/" . $_FILES["file"]["name"]);
    echo "Stored in: " . "images/" . $_FILES["file"]["name"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Logo</title>
</head>
<body>
<h1>Upload Logo</h1>
<form method="post" action="control-pannel.php" enctype="multipart/form-data">
    <label for"file">Choose a Logo: </label>
    <input name="file" id="file" type="file" />
    <button>Upload</button>
</form>

<form id="uploadLogo" name="uploadLogo" action="">
<input type="hidden" id="filename" value="<?echo $_FILES["file"]["name"];?>"/>

</body>
</html>

<?php require_once('footer.php');
ob_flush(); ?>