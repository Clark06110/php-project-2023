<?php
session_start();

if (!isset($_COOKIE['user-info'])) {
    header("Location: /");
} else {
    $data = json_decode($_COOKIE['user-info'], true);
    unset($_SESSION['cart'][$data[0]]);
}

header("Location: /");
exit;
?>