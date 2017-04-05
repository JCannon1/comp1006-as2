<?php 
session_start();
// Authorize login
if (empty($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}
?>