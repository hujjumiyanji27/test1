<?php

// Retrieve the values of the form fields
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
$review_title = $_POST['review_title'];
$review_desc = $_POST['review_desc'];
$review_rating = $_POST['review_rating'];

// Cast product_id to integer if necessary
$product_id = (int) $product_id;

// Establish a database connection
require_once 'connect.php';

// Insert the review into the database
$stmt = $connection->prepare('INSERT INTO tbl_reviews (product_id, user_id, review_title, review_desc , review_rating) VALUES (:product_id, :user_id, :review_title, :review_desc, :review_rating)');
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':review_title', $review_title);
$stmt->bindValue(':review_desc', $review_desc);
$stmt->bindValue(':review_rating', $review_rating);
$stmt->execute();

// Redirect back to the product page
header('Location: product-details1.php?id=' . $product_id);
exit();



?>