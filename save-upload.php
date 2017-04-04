<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Details</title>
</head>
<body>

<?php
print_r($_FILES['file']);

$name = $_FILES['file']['name'];
echo "$name<br />";

$tmp_name = $_FILES['file']['tmp_name'];
echo "$tmp_name<br />";

$name = uniqid("", true) . "-$name";

move_uploaded_file($tmp_name, "images/$name");
?>

</body>
</html>