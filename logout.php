<?php
session_start(); // start the session
session_unset(); // remove all session variables
session_destroy(); // destroy the session

// redirect the user to the index.php page
header("Location: home.php");
exit();
?>
