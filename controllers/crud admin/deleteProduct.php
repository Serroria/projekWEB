<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

if (isset($_POST['delete_selected'])) {
    $delete_ids = $_POST['delete_ids'];

    if (!empty($delete_ids)) {
        $ids = implode(',', array_map('intval', $delete_ids));

        // Query untuk menghapus produk berdasarkan ID
        $delete_products = $conn->prepare("DELETE FROM products WHERE id IN ($ids)");
        $delete_products->execute();

        // Cek apakah tabel sudah kosong
        $result = $conn->query("SELECT COUNT(*) AS total FROM products");
        $row = $result->fetch_assoc();

        if ($row['total'] == 0) {
            // Reset Auto-Increment jika tabel kosong
            $conn->query("ALTER TABLE products AUTO_INCREMENT = 1");
        }

        // header('Location: admin_dashboard.php');
          header('Location: ../../views/admin/admin.php');
        exit;
    } else {
        echo "Tidak ada produk yang dipilih untuk dihapus.";
    }
}
?>
