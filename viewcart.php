<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="style.css">
    <title>tudent shop</title>
    <link rel="website icon" type="png" href="cart.png">


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
                    <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/product.php" class="nav-link">Product</a>
                </li>
                <li class="nav-item">
                    <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/viewcart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a href="https://vesta.uclan.ac.uk/~hmmiyanji/test1/login.php">Login</a>
                </li>
            </ul>
            <div class="hamburger">

                <span class="bar"></span>

                <span class="bar"></span>

                <span class="bar"></span>

            </div>

        </header>

    </head>

</head>



<body>

    <h2 align="center">Your Cart</h2>

    <table>
  <thead>
    <tr>
      <th>Product Image</th>
      <th>Product Title</th>
      <th>Product Description</th>
      <th>Product Price</th>
      <th>Quantity</th>
      <th>Update</th>
      <th>Delete</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody id="product-list">
    <?php
      // Check if the session variable exists and is not empty
      if (isset($_SESSION['product_details']) && !empty($_SESSION['product_details'])) {
        $total_price = 0;
        // Loop through each product in the session variable
        foreach ($_SESSION['product_details'] as $product) {
          // Add the product price to the total price
          $total_price += $product['product_price'];
          ?>
          <tr>
          <td><img src="<?php echo $product['product_image']; ?>" class="productimg"></td>
            <td><?php echo $product['product_title']; ?></td>
            <td><?php echo $product['product_desc']; ?></td>
            <td class="price"><?php echo $product['product_price']; ?></td>
            <td><input type="number" value="1" class="quantity" min="1"></td>
            <td><button class="update">Update</button></td>
            <td><button class="remove">Delete</button></td>
            <td class="subtotal"><?php echo $product['product_price']; ?></td>
          </tr>
          <?php
        }
      } else {
        // Display a message if there are no products in the cart
        ?>
        <tr>
          <td colspan="8">Your cart is empty.</td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>

<table>
  <tr>
    <td colspan="7"></td>
    <td class="cart-total">Total: $<?php echo $total_price; ?></td>
  </tr>
</table>

<script>
  const updateButtons = document.querySelectorAll('.update');
  const removeButtons = document.querySelectorAll('.remove');
  const quantityInputs = document.querySelectorAll('.quantity');
  const subtotalElements = document.querySelectorAll('.subtotal');
  const totalElement = document.querySelector('.cart-total');

  // Loop through each "Update" button and add an event listener
  updateButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      // Get the quantity and price of the product
      const quantity = parseInt(quantityInputs[index].value);
      const price = parseInt(document.querySelectorAll('.price')[index].textContent);
      // Calculate the subtotal and update the corresponding element
      const subtotal = quantity * price;
      subtotalElements[index].textContent = subtotal;
      // Update the total price
      updateTotalPrice();
    });
  });

  // Loop through each "Delete" button and add an event listener
  removeButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      // Remove the corresponding row from the table
      button.parentElement.parentElement.remove();
      // Update the total price
      updateTotalPrice();
    });
  });

  // Function to update the total price
  function updateTotalPrice() {
    // Loop through each subtotal element and add up the values
    let total = 0;
    subtotalElements.forEach(subtotal => {
      total += parseInt(subtotal.textContent);
    });
    // Update the total element
    totalElement.textContent = "Total: $" + total;
  }
</script>

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


<script>
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    menu.classList.toggle('active');
});
</script>

</html>