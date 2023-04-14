// Get all delete buttons
var deleteButtons = document.querySelectorAll('input[value="Delete"]');

// Loop through each delete button
deleteButtons.forEach(function(button) {
  // Add click event listener to the button
  button.addEventListener('click', function() {
    // Get the parent table row of the clicked button
    var row = button.parentNode.parentNode;
    // Get the product key from the data attribute of the row
    var key = row.dataset.key;
    // Make an AJAX request to delete the product from the session
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remove.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Remove the table row from the DOM
        row.remove();
      }
    };
    xhr.send("key=" + key);
  });
});

    
// Get all update buttons
var updateButtons = document.querySelectorAll('input[value="Update"]');

// Loop through each update button
updateButtons.forEach(function(button) {
  // Add click event listener to the button
  button.addEventListener('click', function() {
    // Get the parent table row of the clicked button
    var row = button.parentNode.parentNode;
    // Get the input field that contains the quantity
    var quantityInput = row.querySelector('input[type="number"]');
    // Get the current quantity value
    var quantity = quantityInput.value;
    // Get the price of the product
    var price = row.querySelectorAll('td')[3].textContent;
    // Calculate the total price for the product
    var totalPrice = quantity * price;
    // Update the total price column in the table
    row.querySelectorAll('td')[7].textContent = totalPrice;
  });
});


// Get all input fields for quantities
var quantityInputs = document.querySelectorAll('input[type="number"]');

// Get the "Total Order" field
var totalOrderField = document.querySelector('#total-order');

// Initialize the total order amount to 0
var totalOrderAmount = 0;

// Loop through each quantity input field
quantityInputs.forEach(function(input) {
  // Add a change event listener to the input field
  input.addEventListener('change', function() {
    // Get the parent table row of the input field
    var row = input.parentNode.parentNode;
    // Get the quantity value
    var quantity = input.value;
    // Get the price of the product
    var price = row.querySelectorAll('td')[3].textContent;
    // Calculate the total price for the product
    var totalPrice = quantity * price;
    // Update the total price column in the table
    row.querySelectorAll('td')[7].textContent = totalPrice;
    // Calculate the total order amount
    totalOrderAmount = 0;
    quantityInputs.forEach(function(input) {
      var row = input.parentNode.parentNode;
      var totalPrice = row.querySelectorAll('td')[7].textContent;
      totalOrderAmount += parseFloat(totalPrice);
    });
    // Update the "Total Order" field
    totalOrderField.textContent = totalOrderAmount;
  });
});


// for the star rating

const stars = document.querySelectorAll(".star");

stars.forEach((star) => {
  star.addEventListener("click", () => {
    stars.forEach((s) => (s.checked = false));
    star.checked = true;
  });
});






// for the hamburger menu 

const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    menu.classList.toggle('active');
});

  /* for the scroll up button */

  // Get the button element
var myButton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function topFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    myButton.style.display = "block";
  } else {
    myButton.style.display = "none";
  }
};

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}





