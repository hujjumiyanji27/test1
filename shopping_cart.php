<?php
session_start();
if(isset($_SESSION['user_id'])){
    require_once('connect.php');
    $user_id = $_SESSION['user_id'];
    $stmt = $connection->prepare("SELECT user_full_name FROM tbl_users WHERE user_id=:user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $user['user_full_name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <?php if(isset($name)){ ?>
        <h1>Welcome, <?php echo $name; ?>!</h1>
		echo '<button class="visitbutton"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test/home.php">Home Page</a></button>';
    <?php } else { ?>
        <h1>Welcome to the Shopping Cart!</h1>
		<?php  echo '<button class="visitbutton"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test/home.php">Home Page</a></button>';?>
    <?php } ?>

    <!-- rest of shopping cart code -->
</body>
</html>
