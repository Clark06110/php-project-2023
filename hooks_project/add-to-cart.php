<?php
session_start();

if (!isset($_COOKIE['user-info'])) {
    header("Location: /");
} else {
    $data = json_decode($_COOKIE['user-info'], true);
}

// Initialize the cart array in the session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    echo "<p class='log'>CRÉATION DE LA SESSION[CART]</p><br>";
    $_SESSION['cart'] = array();
}

if (!isset($_SESSION['cart'][$data[0]])) {
    echo "<p class='log'>CRÉATION DE LA SESSION[CART][ID]</p><br>";
    $_SESSION['cart'][$data[0]] = array();
}

$idProduct = $_POST['product_id'];
$titleProduct = $_POST['product_title'];
$titlePrice = $_POST['product_price'];
$arrayProduct = array($idProduct, $titleProduct, $titlePrice);

array_push($_SESSION['cart'][$data[0]], $arrayProduct);

echo "<pre>";
print_r($_SESSION['cart'][$data[0]]);
echo "</pre>";

/////////////// REPRENDRE ICI ////////////////

header("Location: /");

?>