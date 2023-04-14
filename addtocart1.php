<?php
session_start();

$product_image = $_POST['product_image'];
$product_title = $_POST['product_title'];
$product_desc = $_POST['product_desc'];
$product_price = $_POST['product_price'];



// Create an array with the product details
$product = array(
    'product_image' => $product_image,
    'product_title' => $product_title,
    'product_desc' => $product_desc,
    'product_price' => $product_price
);


// making a new variabel with old cart and new data added
$oldCart = $_SESSION['product_details'];

if(isset($_SESSION['product_details'])){
    $oldCart = $_SESSION['product_details'];
} else {
    $oldCart = array();
}

array_push($oldCart, $product);
$_SESSION["product_details"] = $oldCart;
header('Location: product1.php');

?>
