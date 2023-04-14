<?php
     require_once 'connect.php';

?>


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
                <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/logout.php">logout</a>
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

    <main>

        <div align="center">
            <nav class="subNav">
                <span>Products :</span>
                <ul>
                    <li><a class="subNavList" href="#">Jumpers</a></li>
                    <li><a class="subNavList" href="#">Hoodies</a></li>
                    <li><a class="subNavList" href="#">T-shirt</a></li>


                </ul>
            </nav>
        </div>

        <form action="#" name="productsearchform" method="post">
            <input type="text" id="search-input" placeholder="Search for a product..." name="searchtext">
            <button type="submit" name="productsearch">Search</button>
        </form>


    </main>




    <!-- product start from here -->

    <div>
        <?php

    if(isset($_POST['productsearch'])){

      //echo $_POST['searchtext'];
      $stmt = $connection->prepare('SELECT * FROM tbl_products WHERE product_title LIKE ?');
      $stmt->bindParam(1, $_POST['searchtext'], PDO::FETCH_ASSOC);
      $stmt->execute();

    }else{
      $stmt = $connection->prepare('SELECT * FROM tbl_products');
      
    }
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row)
        {
            echo '<div id="product">';
            echo '<form action="addtocart1.php" method="post">'; 
            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
            echo '<img src="' . $row['product_image'] . '" alt="' . $row['product_title'] . '" id="product-image">';
            echo '<input type="hidden" name="product_image" value="' . $row['product_image'] . '">';
            echo '<h2 id="product-title">' . $row['product_title'] . '</h2>';
            echo '<input type="hidden" name="product_title" value="' . $row['product_title'] . '">';
            echo '<div class="product-desc-container">';
            echo '<p class="product-desc">' . substr($row['product_desc'], 0, 33) . '...</p>';
            echo '<a href="product-details1.php?id=' . $row['product_id'] . '">Read More</a>';
            echo '</div><br><br>';
            echo '<a href="review.php?id=' . $row['product_id'] . '">Add Review</a><br><br>';
            echo '<input type="hidden" name="product_desc" value="' . $row['product_desc'] . '">';
            echo '<span id="product-price">' . $row['product_price'] . '</span> <br>';
            echo '<input type="hidden" name="product_price" value="' . $row['product_price'] . '">';
            echo '<button>Add to Cart</button>';
            echo '</form>';
            echo '</div>';
        }
    ?>
    </div>



    <!-- scroll to top button -->



    <!-- product finish here -->

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script src="app.js"></script>
    <script>
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
    </script>

</body>

<!-- footer start from here -->
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

<script>
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    menu.classList.toggle('active');
});


// scroll to top 

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>

</html>