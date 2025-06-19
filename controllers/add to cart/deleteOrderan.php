<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_GET['delete_cart'])) {
    $cart_id = $_GET['delete_cart'];

    $delete_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $delete_cart->bind_param('i', $cart_id);
    $delete_cart->execute();

    header('Location: cart_page.php');
    exit;
}
?>