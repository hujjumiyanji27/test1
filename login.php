<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <style>
    @media only screen and (max-width: 768px) {

        .hamburger {

            display: block;

        }




        .nav-menu {

            display: none;

        }




        .nav-menu.active {

            display: block;

        }

    }




    @media only screen and (min-width: 769px) {

        .hamburger {

            display: none;

        }




        .nav-menu {

            display: flex;

        }

    }




    /* scroll to top button */




    #myBtn {

        display: none;

        position: fixed;

        bottom: 300px;

        left: 30px;

        z-index: 1;

        font-size: 18px;

        border: none;

        outline: none;

        background-color: #333;

        color: white;

        cursor: pointer;

        padding: 15px;

        border-radius: 10px;

    }




    #myBtn:hover {

        background-color: #555;

    }
    </style>

    <title>Student Shop</title>

    <header class="header">

        <div class="logoimage"><img src="uclan.png" alt="logo of university"></div>

        <div class="shop">

            <h1>Student Shop</h1>

        </div>

        <ul class="nav-menu" id="nav-menu">

            <li class="nav-item">

                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/visitasguest.php" class="nav-link">Guest</a>

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
    <form action="hey.php" method="post">

        <fieldset class="mainlogin">
            <div class="logincontainer">
                <h1 class="login">Registration Form</h1>

                <strong>Full name :</strong>
                <input type="text" value="" class="firstname" name="fullname">
                <br>
                <br>
                <strong>Address :</strong>
                <input type="text" value="" class="address" name="address">
                <br>
                <br>
                <strong>email :</strong>
                <input type="text" value="" class="email" name="email">
                <br>
                <br>
                <strong>Password :</strong>
                <input type="text" value="" class="Password" name="password">
                <br>
                <br>
                <button onclick="alert('Successfully Submitted');">Submit</button>

            </div>
            <h1>if you have already account : </h1>
            <button><a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/alreadyuser.php"
                    class="alreadyregistered">click here</a></button>

        </fieldset>
    </form>

</body>

<br><br><br><br><br><br><br><br><br><br>

<!--footer start from here-->

<script src="app.js"></script>
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

</body>

</html>

</html>