<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $gambar = basename($_FILES['gambar']['name']);
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    // Handle file upload
    $target_dir = '../../uploads/';
    $target_file = $target_dir . $gambar;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        die("Hanya file JPG, JPEG, dan PNG yang diperbolehkan.");
    }

    if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        die("Terjadi kesalahan saat mengunggah gambar.");
    }

    $add_product = $conn->prepare("INSERT INTO products (nama, gambar, deskripsi, category_id, harga, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
    $add_product->bind_param('sssdi', $name, $gambar, $description, $category_id, $price);
    $add_product->execute();

    header('Location: admin_dashboard.php');
    exit;
}
?>
