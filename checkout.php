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
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/product.php"
                    class="nav-link">Product</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/viewcart.php">Cart</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/login.php">Logout</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>
</head>

<body>


    <h2 class="card number">card number</h2>
    <input type="number" maxvalue="16">
    </label>
    <h2 class="security">Security code</h2>
    <input type="number" maxvalue="3">
    </label>
    <h2 class="month&year">Expiry month</h2>
    <input type="date">
    </label>
    
</body>
<!--footer start from here-->

<script src="app.js"></script>
<script>
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    menu.classList.toggle('active');
});
</script>
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