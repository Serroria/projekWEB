<?php
require_once 'Product.php';


if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];
    $category_id = $_POST['category_id'];

    $productObj = new Product();
    $productObj->create($nama, $deskripsi, $harga, $gambar, $category_id, $stok);

    header("Location: admin.php");
}
?>
