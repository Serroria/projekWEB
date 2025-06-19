<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();

if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Validasi apakah produk ada di tabel products
    $check_product = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $check_product->bind_param('i', $product_id);
    $check_product->execute();
    $product_result = $check_product->get_result();

    if ($product_result->num_rows == 0) {
        die("Error: Produk tidak ditemukan.");
    }

    // Cek apakah produk sudah ada di keranjang
    $check_cart = $conn->prepare("SELECT * FROM carts WHERE product_id = ? AND session_id = ?");
    $check_cart->bind_param('is', $product_id, $session_id);
    $check_cart->execute();
    $cart_result = $check_cart->get_result();

    if ($cart_result->num_rows > 0) {
        // Update jumlah jika produk sudah ada di keranjang
        $update_cart = $conn->prepare("UPDATE carts SET quantity = quantity + ? WHERE product_id = ? AND session_id = ?");
        $update_cart->bind_param('iis', $quantity, $product_id, $session_id);
        $update_cart->execute();
    } else {
        // Tambahkan produk ke keranjang
        $add_to_cart = $conn->prepare("INSERT INTO carts (product_id, quantity, session_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        $add_to_cart->bind_param('iis', $product_id, $quantity, $session_id);
        $add_to_cart->execute();
    }

    // Redirect ke halaman cart_page.php
    header('Location: cart_page.php');
    exit;
}
?>
