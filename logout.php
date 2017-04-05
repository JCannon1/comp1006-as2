<?php ob_start();

// get current session to delete it
session_start();

// end the user's session
session_destroy();

// send user back to the home page
header('location:default.php');

ob_flush(); ?>