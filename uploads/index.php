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

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>JamuKita - Gaya Hidup Sehat</title>
  <link rel="stylesheet" href="../assets/css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <div class="navbar">
    <a href="#">
        <img src="../assets/images/iconLogo.png" alt="JamuKita Logo" style="height: 40px; vertical-align: middle;">
    </a>
    <div class="menu">
        <a href="#">Beranda</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Cara Order</a>
        <a href="#">Kontak Kami</a>
        <a href="#">Lihat Keranjang</a>
    </div>
  </div>

  <div class="header">
     <div class="banner">
        <!-- <h1>GAYA HIDUP SEHAT</h1>
        <p>Nikmati Hidup Sehat Setiap Hari</p>
        <div class="tagline">Minum jamu, rasakan manfaatnya. Mulai perjalanan sehat Anda bersama Jamukita.</div> -->
    </div>
  </div>

  <div class="search">
    <div class="search">
        <input type="text" placeholder="Cari produk di sini..." />
        <button class="btn">Cari</button>
    </div>
  </div>

  <div class="produk-container">
    <?php
      $produk = [
        ["nama" => "Buyung Upik", "kategori" => "jamuAnak", "harga" => "10.000.000", "gambar" => "https://i.imgur.com/4Puc4AI.png"],
        ["nama" => "Jamu Galian Encok", "kategori" => "jamuHerbal", "harga" => "4.000", "gambar" => "https://i.imgur.com/tQTC6Tv.png"],
        ["nama" => "Jamu Temulawak", "kategori" => "minumanHerbal", "harga" => "3.000", "gambar" => "https://i.imgur.com/EiI7McB.png"]
      ];

      foreach ($produk as $p) {
        echo '<div class="produk">
          <img src="'.$p["gambar"].'" alt="'.$p["nama"].'">
          <h3>'.$p["nama"].'</h3>
          <p><strong>Kategori:</strong> '.$p["kategori"].'</p>
          <p><strong>Harga:</strong> Rp. '.$p["harga"].'</p>
          <button class="btn">Checkout</button>
          <button class="btn" style="background-color: gray;">Add</button>
        </div>';
      }
    ?>
  </div>

  <div class="footer">
    <img src="../assets/images/iconLogo.png" alt="JamuKita Logo" style="height: 45px; vertical-align: middle;">
    <p>Ikuti Kami</p>
    <!-- logo ig fesbuk tiktok -->
     <div class="social-icons">
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-tiktok"></i></a>
    </div>
    <p>&copy; 2025 Website Anda. Semua Hak Dilindungi.</p>
  </div>

</body>
</html>
