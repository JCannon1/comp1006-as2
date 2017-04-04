<?php ob_start();

$pageTitle = 'Admin Users List';
require_once('header.php'); ?>

<div class="list-group">
  <a href="admin-user.php" class="list-group-item">Add, Edit and Delete Site Administrators</a>
  <a href="page-details.php" class="list-group-item">Manage Site Content</a>
  <a href="logo.php" class="list-group-item">Upload a new logo</a>
  <a href="admin-user.php" class="list-group-item">View the public site</a>
</div>

<?php require_once('footer.php');
ob_flush(); ?>