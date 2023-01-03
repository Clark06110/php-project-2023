<?php

// Start the session
session_start();

// Get the product ID
$product_id = $_POST['cart_id'];
echo "<pre>";
// print_r("<h1>hello 1</h1>");
// print_r($product_id);
print_r("<h1>hello 2</h1>");
print_r($_SESSION['cart']);
echo "</pre>";

// Loop through the cart items
foreach ($_SESSION['cart'] as $index => $product) {
  // Check if the element is in the sub-array
  if ($product_id == $product[0]) {
    // Remove the sub-array from the global array
    echo "<pre>";
    print_r("<h1>hello index</h1>");
    print_r($product);
    echo "</pre>";
    unset($_SESSION['cart'][$index]);
  }

}
$_SESSION['cart'] = array_values($_SESSION['cart']);
echo "<pre>";
print_r("<h1>HELLOOOOOOOOOOOOOOOOOO</h1>");
print_r($_SESSION['cart']);
echo "</pre>";

// Redirect back to the cart page
header("Location: ../cart.php");

?>
