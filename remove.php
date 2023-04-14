<?php
// start the session
session_start();

// get the product key to delete
$key = $_POST['key'];

// remove the product from the session array
unset($_SESSION['product_details'][$key]);

// send a response to indicate success
echo "Product deleted successfully";

?>
