<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Details</title>
</head>
<body>

<?php
print_r($_FILES['anyFile']);

$name = $_FILES['anyFile']['name'];
echo "$name<br />";

$type = $_FILES['anyFile']['type'];
echo "$type<br />";

$tmp_name = $_FILES['anyFile']['tmp_name'];
echo "$tmp_name<br />";

$name = uniqid("", true) . "-$name";

move_uploaded_file($tmp_name, "uploads/$name");
?>

</body>
</html>