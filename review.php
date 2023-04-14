<!DOCTYPE html>
<html>

<head>
    <title>Product Reviews</title>
    <style>

    </style>
</head>

<body>
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
    <p>No reviews found.</p>
    <?php endif; ?>

    <form method="POST" action="submit_review.php">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <!-- <label for="username">Username:</label> -->
        <input type="hidden" name="user_id" required>
        <label for="review_title">Title:</label>
        <textarea name="review_title" required></textarea>
        <label for="review_desc">description:</label>
        <textarea name="review_desc" required></textarea>
        <button type="submit">Submit Review</button>
    </form>

</body>

</html>