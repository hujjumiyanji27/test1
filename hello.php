<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Shop</title>
    <header class="header">
        <div class="logoimage"><img src="uclan.png" alt="logo of university"></div>

        <div class="shop">

            <h1>Student Shop</h1>

        </div>

        <ul class="nav-menu" id="nav-menu">
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/product.php" class="nav-link">Product</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/viewcart.php">Cart</a>
            </li>
        </ul>
        <div class="hamburger">

            <span class="bar"></span>

            <span class="bar"></span>

            <span class="bar"></span>

        </div>

    </header>

</head>


<br><br><br><br><br><br><br><br><br><br>

<body>

    <?php
$EMAIL = $_POST['EMAIL'];
$hashed_password = $_POST['PASSWORD'];

//Database connection here
$connection = mysqli_connect("localhost" , "hmmiyanji" , "rAQTnjMv" , "hmmiyanji");

if(isset($_POST['EMAIL']) && isset($_POST['PASSWORD'])) {
    $email = $_POST['EMAIL'];
    $hashed_password = $_POST['PASSWORD'];
}

if ($connection->connect_error) {
    die('Connection Failed : '.$connection->connect_error);
} else {
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];
    $stmt = $connection->prepare("SELECT * FROM tbl_users WHERE user_email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
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
    }
    else if ($data && $data['user_pass'] != $hashed_password) {
        echo "<h2>Invalid email and password</h2>";
        echo "<h2>Please try again</h2>";
        echo '<button class="visitbutton"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/alreadyuser.php">click here to try again</a></button>';
    }
    else {
        echo "<h2>You are not a user please register first</h2>";
        echo '<button class="visitbutton"><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/login.php">click here to register</a></button>';   
    }
}
?>


</body>

<br><br><br><br><br><br><br><br><br>

<script src="app.js"></script>

</body>

<!--footer start from here-->

<fieldset>
    <div class="footer">
        <div class="links">
            <h3>Links</h3>
            <li class="navlist"><a href="https://www.uclansu.co.uk/">https://www.uclansu.co.uk</a></li>
        </div>
        <div class="contact">
            <h3>Contact</h3>
            <h4><strong>email:</strong>@uclan.ac.uk</h4>
            <h4><strong>Phone:</strong>017728893000</h4>
        </div>
        <div class="location">
            <h3>Location</h3>
            <h4><strong>University of Central Lanchashire Student Union</strong>
                Fylde Road, Preston.PR1 7BY
            </h4>
            <h4>
                registered in england
                Comapany Number:7623971
                Registered Charity Number:
            </h4>

        </div>
    </div>
</fieldset>

<!--footer finish here-->


</html>