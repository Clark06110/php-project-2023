<?php

// Start the session
session_start();

// Get the product ID
$product_id = $_POST['cart_id'];
/*
echo "<pre>";
print_r("<h1>hello 2</h1>");
print_r($_SESSION['cart']);
echo "</pre>";
*/
if (!isset($_COOKIE['user-info'])) {
  header("Location: /");
} else {
  $data = json_decode($_COOKIE['user-info'], true);

  // Loop through the cart items
  foreach ($_SESSION['cart'][$data[0]] as $index => $product) {
    // Check if the element is in the sub-array
    if ($product_id == $product[0]) {
      // Remove the sub-array from the global array
      echo "<pre>";
      print_r("<h1>hello index</h1>");
      print_r($product);
      echo "</pre>";
      unset($_SESSION['cart'][$data[0]][$index]);
    }
  }
  $_SESSION['cart'][$data[0]] = array_values($_SESSION['cart'][$data[0]]);
}


echo "<pre>";
print_r("<h1>HELLOOOOOOOOOOOOOOOOOO</h1>");
print_r($_SESSION['cart'][$data[0]]);
echo "</pre>";

// Redirect back to the cart page
header("Location: ../cart.php");

?>
