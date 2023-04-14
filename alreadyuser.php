<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Shop</title>
</head>

<!-- header start from here -->

<header class="header">
    <div class="logoimage">
        <img src="uclan.png" alt="logo of university">
    </div>
    <div class="shop">
        <h1>Student Shop</h1>
    </div>
    <ul class="nav-menu" id="nav-menu">
        <li class="nav-item">
            <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/home.php" class="nav-link">Visit as guest</a>
        </li>
    </ul>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</header>

<!-- body start from here -->

<body>
    <form action="hello.php" method="post">

        <fieldset class="mainlogin">
            <div class="logincontainer">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="hello.php" method="post">
                        <p>
                            <label>Username/Email address<span>*</span></label>
                            <input type="text" placeholder="Username or Email" required name="EMAIL">
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" required name="PASSWORD">
                        </p>
                        <p>
                            <input type="submit" value="Sign In">
                        </p>

                    </form>
                </div>
            </div>
            <h1>Sign up : </h1>
            <button><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test/login.php" class="registeruser">click
                    here</a></button>

        </fieldset>
    </form>

</body>


<!--footer start from here-->

<script src="app.js"></script>
<!-- <script>
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.nav-menu');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            menu.classList.toggle('active');
        });
        </script> -->

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


<!--footer finish here-->

</body>

</html>