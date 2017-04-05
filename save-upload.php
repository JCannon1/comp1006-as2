<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Details</title>
</head>
<body>

<?php
if (!empty($_FILES['logo']['name'])) {
        $name = $_FILES['logo']['name'];

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
        $size = $_FILES['logo']['size'];
        if ($size > 2048000) {
            echo 'Logo Image must be less than 2 MB<br />';
            $ok = false;
        }

        // rename to unique file name
        $logo = uniqid("") . "-$name";

        // copy to /covers folder
        $tmp_name = $_FILES['logo']['tmp_name'];
        move_uploaded_file($tmp_name, "logos/$logo");

    }
?>

</body>
</html> 


