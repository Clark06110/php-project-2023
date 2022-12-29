<?php
session_start();

// Initialize the cart array in the session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    echo "<p class='log'>CRÉATION DE LA SESSION[CART]</p><br>";
    $_SESSION['cart'] = array();
}

$titleProduct = $_POST['product_title'];
$titlePrice = $_POST['product_price'];
$arrayProduct = array($titleProduct, $titlePrice);

array_push($_SESSION['cart'], $arrayProduct);
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";

/////////////// REPRENDRE ICI ////////////////

header("Location: /");

?>