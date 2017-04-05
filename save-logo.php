<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Details</title>
</head>
<body>

<?php
if (!empty($_FILES['anyFile']['name'])) {
        $name = $_FILES['anyFile']['name'];

        // use end() and explode() to get the letters after the last period i.e. the file extension
        $arr = end(explode('.', $name));
        //echo $arr;

        // convert the extension to lower case
        $type = strtolower($arr);
        //echo $type;

        // allow jpg / png / gif / svg
        $fileTypes = ['jpg', 'png', 'gif', 'svg'];

        if (!in_array($type, $fileTypes)) {
            echo 'Invalid Image Type<br />';
            $ok = false;
        }

        // size check
        $size = $_FILES['anyFile']['size'];
        if ($size > 2048000) {
            echo 'Logo Image must be less than 2 MB<br />';
            $ok = false;
        }

        // rename to unique file name
        $name = uniqid("") . "-$name";

        // copy to /covers folder
        $tmp_name = $_FILES['anyFile']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/$name");

    }
?>

</body>
</html>