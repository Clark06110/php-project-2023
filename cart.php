<?php
$title = "CART";
require_once "components_project/project-header.php";
?>
  
<?php
session_start();

// Display the cart
echo "<h1>Cart</h1>";
echo "<ul>";
if (!isset($_COOKIE['user-info'])) {
  header("Location: /");
} else {
  $data = json_decode($_COOKIE['user-info'], true);

  if (!empty($_SESSION['cart'][$data[0]])) {
      // The cart is empty
      // Create a table to display the cart contents
      echo "<table class='table-cart'>";
      echo "<tr>";
      echo "<th>Title</th>";
      echo "<th>Price</th>";
      echo "<th>Action</th>";
      echo "</tr>";
      foreach ($_SESSION['cart'][$data[0]] as $product) {
        // Display the product information
        echo "<tr>";
        echo "<td>" . $product[1] . "</td>";
        echo "<td>" . $product[2] . "</td>";
        // echo "<td>" . $product[0] . "</td>";
        echo "<td>";
        // Add a delete button for the product
        echo "<form action='hooks_project/delete-product-cart.php' method='post'>";
        echo "<input type='hidden' name='cart_id' value='" . $product[0] . "'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
      }
      // Close the table
      echo "</table>";
  } else {
      // The cart is not empty
      echo "<li>The CART is empty !!!</li>";
  }
}
echo "</ul>";
?>

<?php
require_once "components_project/project-footer.php";
?>