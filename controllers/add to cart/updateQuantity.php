<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();

if (isset($_POST['cart_id']) && isset($_POST['quantity']) && isset($_POST['action'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];
    $action = $_POST['action'];

    if ($action == 'increase') {
        $quantity++;
    } elseif ($action == 'decrease' && $quantity > 1) {
        $quantity--;
    }

    // Update jumlah produk di keranjang
    $update_quantity = $conn->prepare("UPDATE carts SET quantity = ? WHERE id = ? AND session_id = ?");
    $update_quantity->bind_param('iis', $quantity, $cart_id, $session_id);
    $update_quantity->execute();

    // Redirect kembali ke halaman keranjang belanja
    header('Location: cart_page.php');
    exit();
}
?>
