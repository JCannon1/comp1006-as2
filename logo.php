<?php ob_start();

$pageTitle = 'Upload Logo';
require_once('header.php'); ?>

<!--?php 
// if (file_exists("images/" . $_FILES["file"]["name"]))
//     {
//     $_FILES["file"]["name"] . " File name already exists. ";
//     }
// else {
//     move_uploaded_file($_FILES["file"]["tmp_name"],
//     "images/" . $_FILES["file"]["name"]);
//     echo "Stored in: " . "images/" . $_FILES["file"]["name"];
//     }
?>-->

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
        echo '<div>
            <img src="images/' . $logo . '" title="Logo" />
            </div>';
    }
    ?>

<!--<form id="logo" name="logo" action="">
<input type="hidden" id="logo" value="?echo $_FILES["file"]["name"];?>"/>
</form>-->

</body>
</html>

<?php require_once('footer.php');
ob_flush(); ?>