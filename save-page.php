<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Page</title>
</head>
<body>

<?php
// save page inputs to variables
$title = $_POST['title'];
$content = $_POST['content'];
$ok = true;

// validate inputs
if (empty($title)) {
    echo 'Title is required<br />';
    $ok = false;
}

if (empty($content)) {
    echo 'Content is required<br />';
    $ok = false;
}

if ($ok) {

    // connect to my database
    require_once ('db.php');

    // set up sql insert
    $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";

    // execute the save
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 255);
    $cmd->execute();

    // disconnect from my database
    $conn = null;

    echo 'Page Saved. <a href="pages.php">Pages</a>';
}
?>
</body>
</html>
