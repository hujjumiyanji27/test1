<?php
require_once('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $connection->prepare("SELECT * FROM tbl_users WHERE user_email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data && password_verify($password, $data['user_pass'])) {
    // password is correct, so log in the user
    // display the welcome message and other user data
    echo '<div class="card">';
    echo "<h2>Successfully login</h2><br>";
    echo "<h2>Greeting card for you my dear user</h2><br>";
    echo "<h2 class='welcome-message'>Welcome, " . $data['user_full_name'] . "!</h2><br>";
    echo "<h2>Thanks for registering with us </h2><br><br>";
    echo '<button class="visitbutton"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/home1.php">click here to visit website</a></button><br>';
    echo '<div>';
} else {
    // password is incorrect, show error message
    echo "Invalid email or password";
}
?>
