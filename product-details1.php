<?php
     require_once 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="style.css">
    <style>
    .product-desc-full {
        display: none;
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

        </nav>
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

        <body>

            <?php
// Check if the product ID is set in the URL parameter
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    // Fetch the product details from the database using the product ID
    $stmt = $connection->prepare('SELECT * FROM tbl_products WHERE product_id = ?');
    $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch the reviews for the product from the database
    $stmt = $connection->prepare('SELECT * FROM tbl_reviews WHERE product_id = ?');
    $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    ?>

            <?php
// Check if the product variable is set
if(isset($product)) {
    // Display the product details
    echo '<div id="product">';
    echo '<form action="addtocart.php" method="post">'; 
    echo '<input type="hidden" name="product_id" value="' . $product['product_id'] . '">';
    echo '<img src="' . $product['product_image'] . '" alt="' . $product['product_title'] . '" id="product-image">';
    echo '<input type="hidden" name="product_image" value="' . $product['product_image'] . '">';
    echo '<h2 id="product-title">' . $product['product_title'] . '</h2>';
    echo '<input type="hidden" name="product_title" value="' . $product['product_title'] . '">';
    echo '<div class="product-desc-container">';
    echo '<p class="product-desc">' . substr($product['product_desc'], 0, 200) . '...</p>';
    echo '<a href="product-details.php?id=' . $product['product_id'] . '">Read More</a>';
    echo '</div><br><br>';
    echo '<a href="review.php?id=' . $product['product_id'] . '">Add Review</a><br><br>';
    echo '<input type="hidden" name="product_desc" value="' . $product['product_desc'] . '">';
    echo '<span id="product-price">' . $product['product_price'] . '</span> <br>';
    echo '<input type="hidden" name="product_price" value="' . $product['product_price'] . '">';
    echo '<button>Add to Cart</button>';
    echo '</form>';
    echo '</div>';

    // Display the reviews for the product
    
    if (!empty($reviews)) {
        // Display reviews
        echo '<div id="reviews">';
    echo '<h3>Reviews:</h3>';
    
    foreach ($reviews as $review) {
      echo '<div class="review">';
      echo '<h4>' . $review['review_title'] . '</h4>';
      echo '<p>' . $review['review_desc'] . '</p>';
      echo '<p>Rating: ' . $review['review_rating'] . '/5</p>';
      echo '</div>';
    }
    
    echo '</div>';
    } else {
        echo '<p>No reviews yet.</p>';
    }
} else {
    echo 'Product not found';
}
}
?>

<?php
      $connection = new PDO('mysql:host=localhost;dbname=hmmiyanji;charset=utf8', 'hmmiyanji', 'rAQTnjMv');

      // Query the database for all reviews related to a particular product
      $stmt = $connection->prepare('SELECT * FROM tbl_reviews WHERE product_id = ?');
      $stmt->bindParam(1, $_GET['user_id'], PDO::PARAM_INT);
      $stmt->execute();
      $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1>Product Reviews</h1>

    <?php if(count($reviews) > 0): ?>
    <?php foreach($reviews as $review): ?>
    <div class="review">
        <h3><?php echo $review['user_id']; ?></h3>
        <p><?php echo $review['review_desc']; ?></p>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>

    
        <form method="post" action="submit_review.php">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <!-- <label for="username">Username:</label> -->
            <input type="hidden" name="user_id" required>
            <label for="review_title">Title:</label>
            <textarea name="review_title" required></textarea>
            <label for="review_desc">description:</label>
            <textarea name="review_desc" required></textarea>
            <p>Rating</p>
            <input type="number" name="review_rating" reqired>
            <button type="submit">Submit Review</button>
        </form>
        </body>

</html>