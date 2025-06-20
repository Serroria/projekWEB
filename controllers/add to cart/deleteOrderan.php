<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_GET['cart_id'])) {
    $cart_id = intval($_GET['cart_id']);

    $delete_cart = $conn->prepare("DELETE FROM carts WHERE id = ?");
    $delete_cart->bind_param('i', $cart_id);
    $delete_cart->execute();

    header('Location: cart_page.php');
    exit;
}
?>
