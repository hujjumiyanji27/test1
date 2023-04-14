<?php
// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the product ID is provided in the URL.
if (!isset($_GET['product_id'])) {
    header('Location: index.php');
    exit();
}

// Get the product details from the database.
$stmt = $connection->prepare('SELECT * FROM tbl_products WHERE product_id = ?');
$stmt->bindParam(1, $_GET['product_id'], PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// If the product is not found, redirect to the homepage.
if (!$product) {
    header('Location: index.php');
    exit();
}

// If the form is submitted, insert the review into the database.
if (isset($_POST['submit'])) {
    $stmt = $connection->prepare('INSERT INTO tbl_review (user_id, product_id, review_title, review_desc, review_rating) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute(array($_SESSION['user_id'], $_POST['product_id'], $_POST['review_title'], $_POST['review_desc'], $_POST['review_rating']));
    header('Location: product-details.php?id=' . $_GET['product_id']);
    exit();
}
?>

<h1>Add Review for <?php echo $product['product_title']; ?></h1>

<form method="post">
    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
    <label for="review_title">Title:</label><br>
    <input type="text" name="review_title" required><br>
    <label for="review_desc">Description:</label><br>
    <textarea name="review_desc" rows="5" required></textarea><br>
    <label for="review_rating">Rating:</label><br>
    <select name="review_rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br>
    <input type="submit" name="submit" value="Submit Review">
</form>
