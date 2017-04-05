<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Details</title>
</head>
<body>

<?php

try {
    $logo = null; 

    $ok = true;

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
        move_uploaded_file($tmp_name, "logos/$name");

    }

    if ($ok == true) {
        // connect to db - dbtype, server address, dbname, username, password
        require_once('db.php');

        // set up an SQL instruction to save the new album - INSERT or UPDATE
        if (empty($logoId)) {
            $sql = "INSERT INTO logos (logoId, logo) VALUES (:logo);";
        } else {
            $sql = "UPDATE logos SET logo = :logo WHERE logoId = :logoId";
        }

        // pass the input variables to the SQL command
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':logo', $logo, PDO::PARAM_STR, 50);

        // populate id if we have one
        if (!empty($logoId)) {
            $cmd->bindParam(':logoId', $logoId, PDO::PARAM_INT);
        }

        // execute the INSERT
        $cmd->execute();

        // disconnect
        $conn = null;

        // show a message to the user
        //echo 'Logo Saved';
        header('location:logo.php');
    }
}
catch (exception $e) {
    header('location:error.php');
}
?>

</body>
</html>