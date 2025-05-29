<?php
require_once 'koneksi.php';

class Product
{
    public function getAll()
    {
        $db = koneksi();
        $stmt = $db->query("
            SELECT products.*, categories.nama AS category_nama
            FROM products
            JOIN categories ON products.category_id = categories.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama, $deskripsi, $harga, $gambar, $category_id, $stok)
    {
        $db = koneksi();
        $stmt = $db->prepare("INSERT INTO products (nama, deskripsi, harga, gambar, category_id, stok) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nama, $deskripsi, $harga, $gambar, $category_id, $stok]);
    }
}
?>
