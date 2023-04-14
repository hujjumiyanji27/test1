<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
<?php
require_once('connect.php');

$FIRSTNAME = $_POST['fullname'];
$ADDRESS= $_POST['address'];
$EMAIL = $_POST['email'];
$hashed_password = $_POST['password'];
$ts = 'NOW()';
//Database connection

// generate a secure hash of the password
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// store the hashed password in the database
$stmt = $connection->prepare("INSERT INTO tbl_users (user_id, user_full_name, user_address, user_email, user_pass) VALUES (NULL, :name, :address, :email, :pass)");

$stmt->bindParam(':name', $FIRSTNAME);
$stmt->bindParam(':address', $ADDRESS);
$stmt->bindParam(':email', $EMAIL);
$stmt->bindParam(':pass', $hashed_password);

$stmt->execute();
$success = $stmt->rowCount();



    header('location:alreadyuser.php');
    

?>


<h2>For login click here</h2>
        <button class="login"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/webtech%20trial%202/alreadyuser.php">Login</a></button>
</body>
</html>






