<?php
session_start();
$base_url = dirname($_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Navbar</title>
  <link rel="stylesheet" href="../../assets/css/navbarHome.css" />
  <link rel="stylesheet" href="../../assets/css/posterSlide.css" />
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
      align-items: center;
      justify-content: center;
    }
    .modal.show {
      display: flex;
    }
    .modal-content {
      background-color: #fff;
      padding: 20px;
      max-width: 700px;
      width: 90%;
      border-radius: 10px;
    }
    .close-modal {
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="navbar-container">
    <a href="#" class="navbar-logo">
      <img src="<?= $base_url ?>/assets/images/iconLogo.png" alt="logoJamuKita">
    </a>
    <button class="navbar-toggle">
      <span class="bar"></span><span class="bar"></span><span class="bar"></span>
    </button>
    <ul class="navbar-menu">
      <li><span style="color: #fff">👋 Halo, <?= $_SESSION['nama'] ?? 'Pengunjung'; ?></span></li>
      <li><a href="#" class="menu-item">Beranda</a></li>
      <li><a href="#" class="menu-item">Tentang Kami</a></li>
      <li><a href="#" class="menu-item">Cara Order</a></li>
      <li><a href="#" class="menu-item">Kontak Kami</a></li>
      <li><a href="<?= $base_url ?>/controllers/add%20to%20cart/cart_page.php" class="text-sm text-gray-800 hover:underline">🛒 Keranjang</a></li>
      <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
        <li><a href="<?= $base_url ?>/views/login/logout.php" class="text-sm text-red-600 hover:underline">Logout</a></li>
      <?php else: ?>
        <li><a href="<?= $base_url ?>/views/login/login.php" class="text-sm text-blue-600 hover:underline">Login</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<!-- MODAL -->
<div class="modal" id="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close-modal" id="closeBtn">&times;</span>
      <div id="modal-title"></div>
    </div>
    <div class="modal-body" id="modal-body"></div>
  </div>
</div>

<script src="<?= $base_url ?>/assets/js/navbarContent.js"></script>

</body>
</html>
