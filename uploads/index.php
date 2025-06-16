<?php
require_once '../config/koneksi.php';


$db = new koneksi();
$conn = $db->getConnection();

// Cek apakah koneksi berhasil
if ($conn) {
    echo "Koneksi database berhasil!";
} else {
    echo "Koneksi database gagal!";
}

$nama = "Kelompok 1";

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Web Sederhana PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body text-center">
                <h1 class="mb-3">Selamat Datang di Website Sederhana</h1>
                <p class="lead">Halo, <strong><?php echo $nama; ?></strong>! Ini contoh web PHP sederhana.</p>
            </div>
        </div>
    </div>
</body>
</html>