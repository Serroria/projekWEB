<?php
$base_url = dirname($_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Footer Tengah</title>

  <!-- Font Awesome untuk ikon sosial media -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-..."
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <style>

    .footer {
      background-color: #902727;
      color: white;
      padding: 5x 10px 10px 10px;
      margin-top: 32px;
      text-align: center;
    }

    .footer-logo {
      height: 50px;
      margin-bottom: 20px;
    }

    .footer h3 {
      margin-bottom: 10px;
    }

    .social-icons a {
      color: white;
      margin: 0 10px;
      font-size: 24px;
      transition: color 0.3s ease;
      text-decoration: none;
    }

    .social-icons a:hover {
      color: #fcd34d;
    }

    .footer p {
      margin-top: 20px;
      font-size: 14px;
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <!-- Footer Tengah -->
  <footer class="footer">
    <div class="flex justify-center items-center">
  <img src="<?= $base_url ?>/assets/images/iconLogo.png" alt="Logo JamuKita" class="w-12 h-12 mb-2" />
    </div>
    <h3>Ikuti Kami</h3>
    <div class="social-icons">
      <a href="https://www.instagram.com/jamu_kita_umkm/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.facebook.com/share/198DFtRiUb/" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://www.tiktok.com/@jamu.kita" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
    <p>© 2025 Website Anda. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>