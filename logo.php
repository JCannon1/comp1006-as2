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
<form method="post" action="control-pannel.php" enctype="multipart/form-data">
    <label for"file">Choose a Logo: </label>
    <input name="file" id="file" type="file" />
    <button>Upload</button>
</form>

<?php 
    $logo = "images/";

    if (is_dir($logo)) {
        if ($open = opendir($folder))
        {
            while (($file = readdir($open)) !=false)
            {
                if ($file =='.' || $file =='..') continue;

                echo ' <img src ="images/'.$file.'" width = "200" height = "150" >';
            }
            closedir($open);
        }
    }
?>

<!--?php
    // if (!empty($logo)) {
    //     echo '<div>
    //         <img src="images/' . $logo . '" title="Logo" />
    //         </div>';
    // }
    ?-->

<!--<form id="logo" name="logo" action="">
<input type="hidden" id="logo" value="<?echo $_FILES["file"]["name"];?>"/>
</form>-->

</body>
</html>

<?php require_once('footer.php');
ob_flush(); ?>