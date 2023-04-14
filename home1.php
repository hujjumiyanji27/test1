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
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/home1.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/product1.php" class="nav-link">Product</a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/viewcart1.php">Cart
                </a>
            </li>
            <li class="nav-item">
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/logout.php">logout
                </a>
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

    <!-- offer start from here -->

    <div class="offer">
        <?php

                require_once 'connect.php';
                $stmt = $connection->prepare('SELECT * FROM tbl_offers');
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($row as $row){
                    echo '<div id="product-offer">';
                    echo '<u><h1>Special Offer</h1></u><br>';
                    echo '<h2>' . $row['offer_title'] . '</h2><br>';
                    echo '<p>' . $row['offer_dec'] . '</p>';
                    echo '</div>';

                }
                
                ?>
    </div>

    <!-- offer finish here -->

    <body>

        <script src="app.js"></script>


        <!--body start from here-->

        <div class="container">
            <div class="main">
                <h1>Where opportunity meets success</h1>
                <br>
                <p>Every student at the university of central lancashire is automatically a member of student union.
                    We're here to make1</p>
                <br>
                <p>Everything you need to know about uclan students union. Your membership starts here.</p>
                <br>
                <h2 style="color: #fff;">Together</h2>
                <br>

                <div class="video">
                    <video width="560" height="315" controls>
                        <source src="together.mp4" type="video/mp4">
                        <br>
                    </video>
                </div>
                <br>
                <div>
                    <h2 style="color: #fff;">Join our global community</h2>
                    <br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/i2CRunZv9CU"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <br>


        <!--body finish here-->

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


    </body>

</html>