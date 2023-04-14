<?php
session_start();

// Check if the login form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
	// Check if the username and password are valid
	if ($_POST['username'] == 'myusername' && $_POST['password'] == 'mypassword') {
		// Store the username in a session variable
		$_SESSION['username'] = $_POST['username'];
		// Redirect to the shopping cart page
		header('Location: welcome.php');
		exit();
	} else {
		// Display an error message if the username or password is invalid
		echo 'Invalid username or password';
	}
}
?>
