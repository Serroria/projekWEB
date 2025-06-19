<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $update_product = $conn->prepare("UPDATE products SET nama = ?, category_id = ?, harga = ?, deskripsi = ? WHERE id = ?");
    $update_product->bind_param('sidsi', $name, $category_id, $price, $description, $product_id);
    $update_product->execute();

    header('Location: admin_dashboard.php');
    exit;
}
?>