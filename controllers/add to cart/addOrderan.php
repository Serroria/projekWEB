<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if product already in cart
    $check_cart = $conn->prepare("SELECT * FROM cart WHERE product_id = ?");
    $check_cart->bind_param('i', $product_id);
    $check_cart->execute();
    $result = $check_cart->get_result();

    if ($result->num_rows > 0) {
        // Update quantity
        $update_cart = $conn->prepare("UPDATE cart SET quantity = quantity + ? WHERE product_id = ?");
        $update_cart->bind_param('ii', $quantity, $product_id);
        $update_cart->execute();
    } else {
        // Insert new product into cart
        $add_to_cart = $conn->prepare("INSERT INTO cart (product_id, quantity) VALUES (?, ?)");
        $add_to_cart->bind_param('ii', $product_id, $quantity);
        $add_to_cart->execute();
    }
    header('Location: cart_page.php');
    exit;
}
?>