<?php ob_start();

$pageTitle = 'Edit Pages';
require_once('header.php'); ?>

<h1>Pages</h1>

<?php
// start session
session_start();

if (!empty($_SESSION['pageId'])) {
    echo '<a href="page-details.php">Add Page</a> ';
}

// try {
    // connect to database
    require_once('db.php');

    $sql = "SELECT pageId, title, content FROM pages ORDER BY title";

    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $adminusers = $cmd->fetchAll();

    // create the table and its headings
    echo '<table class="table table-striped table-hover">
    <tr><th>Title</th><th>Content</th>';

    if (!empty($_SESSION['pageId'])) {
        echo '<th>Edit</th><th>Delete</th>';
    }

    echo '</tr>';

    // loop through the pages data in the database
    foreach ($pages as $page) {
        echo '<tr><td>' . $page['title'] . '</td>
            <td>' . $page['content'] . '</td>
            <td>';
            }
        echo '</td>';

        if (!empty($_SESSION['pageId'])) {
            echo '<td><a href="page-details.php?pageId=' . $page
            ['pageId'] . '" class="btn btn-primary">Edit</a></td>
            <td><a href="delete-page.php?pageId=' . $page['pageId'] 
            . '"
            class="btn btn-danger confirmation">Delete</a></td>';
        }

        echo '</tr>';
    // }

    // end the table
    echo '</table>';

    // disconnect from the database
    $conn =null;
// }
// catch (exception $e) {
//     mail('jessecannon1@hotmail.com', 'User Page Error', $e);
//     header('location:error.php');
// }
?>

<?php require_once('footer.php');
ob_flush(); ?>