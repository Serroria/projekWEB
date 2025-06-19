<?php
session_start();
?>

<?php
$base_url = dirname($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel='stylesheet' href='../../assets/css/navbarHome.css'>
    <link rel='stylesheet' href='../../assets/css/posterSlide.css'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<nav class="navbar">
        <div class="navbar-container">
            <!--logo-->
            <a href="#" class="navbar-logo">
                <img src="<?= $base_url ?>/assets/images/iconLogo.png" alt="logoJamuKita">
            </a>
            <button class="navbar-toggle">  
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <ul class="navbar-menu">
                <li><a href="#" >Beranda</a></li>
                <li><a href="#" class="menu-item">Tentang Kami</a></li>
                <li><a href="#" class="menu-item">Cara Order</a></li>
                <li><a href="#" class="menu-item">Kontak Kami</a></li>
                <li><a href="{{ route('cart.view') }}" class="text-sm text-gray-800 hover:underline">🛒 Keranjang</a></li>
             <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                <li><span class="text-sm text-gray-800">👋 Halo, <?= $_SESSION['nama']; ?></span></li>
                <li><a href="<?= $base_url ?>/views/login/logout.php" class="text-sm text-red-600 hover:underline">Logout</a></li>
            <?php else: ?>
                <li><a href="<?= $base_url ?>/views/login/login.php" class="text-sm text-blue-600 hover:underline">Login</a></li>
            <?php endif; ?>
            </ul>
        </div>
</nav>

    

 <!-- Modal Pop-up -->
<div class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <div id="modal-title"></div>
    <div id="modal-body"></div>
  </div>
</div>


<script src='../../assets/js/navbarHome.js'></script>
<script src='../../assets/js/posterSlide.js'></script>
<script src='../../assets/js/navbarContent.js'></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-item");
    const modal = document.querySelector(".modal");
    const modalTitle = document.getElementById("modal-title");
    const modalBody = document.getElementById("modal-body");
    const navbarMenu = document.querySelector(".navbar-menu"); // tambahkan ini
    const navbarToggle = document.querySelector(".navbar-toggle"); // tambahkan ini

    menuItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            // Close mobile menu if open
            navbarMenu?.classList.remove("active");
            navbarToggle?.classList.remove("active");

            const text = this.textContent.trim();
            let titleContent = "";
            let bodyContent = "";

            // ... seluruh if-else kamu tetap di sini, tidak perlu diubah
            if (text === "Tentang Kami") {
                titleContent = `<h2>Tentang Jamu Kita</h2>`;
                bodyContent = `
                    <p class="modal-description">
                        Jamu Kita adalah platform digital yang menghubungkan tradisi jamu Indonesia dengan teknologi modern. 
                        Kami berkomitmen untuk melestarikan warisan nenek moyang sambil memberdayakan UMKM lokal.
                    </p>
                    <div class="feature-grid">
                        <div class="feature-card">
                            <span class="feature-icon">🌿</span>
                            <div class="feature-title">100% Natural</div>
                            <div class="feature-text">Bahan herbal pilihan berkualitas tinggi</div>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon">🏪</span>
                            <div class="feature-title">Dukung UMKM</div>
                            <div class="feature-text">Memberdayakan pengrajin jamu lokal</div>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon">📱</span>
                            <div class="feature-title">Digital Platform</div>
                            <div class="feature-text">Kemudahan pesan online</div>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon">✨</span>
                            <div class="feature-title">Inovasi Modern</div>
                            <div class="feature-text">Resep tradisional dengan sentuhan modern</div>
                        </div>
                    </div>
                `;
            } else if (text === "Cara Order") {
                titleContent = `<h2>Cara Memesan</h2>`;
                bodyContent = `
                    <p class="modal-description">
                        Proses pemesanan yang mudah dan aman untuk mendapatkan jamu berkualitas langsung ke rumah Anda.
                    </p>
                    <div class="order-steps">
                        <div class="order-step">
                            <div class="step-title">Pilih Produk</div>
                            <div class="step-description">Browse koleksi jamu tradisional dan modern kami, baca deskripsi dan manfaat setiap produk</div>
                        </div>
                        <div class="order-step">
                            <div class="step-title">Tambah ke Keranjang</div>
                            <div class="step-description">Pilih jumlah yang diinginkan dan tambahkan produk favorit Anda ke keranjang belanja</div>
                        </div>
                        <div class="order-step">
                            <div class="step-title">Checkout & Bayar</div>
                            <div class="step-description">Isi data pengiriman, pilih metode pembayaran (Transfer Bank, E-wallet, COD)</div>
                        </div>
                        <div class="order-step">
                            <div class="step-title">Konfirmasi</div>
                            <div class="step-description">Terima konfirmasi pesanan via WhatsApp/Email dan tracking pengiriman</div>
                        </div>
                        <div class="order-step">
                            <div class="step-title">Terima Pesanan</div>
                            <div class="step-description">Produk jamu segar siap dinikmati! Paket dikemas aman dan higienis</div>
                        </div>
                    </div>
                `;
            } else if (text === "Kontak Kami") {
                titleContent = `<h2>Hubungi Kami</h2>`;
                bodyContent = `
                    <p class="modal-description">
                        Tim customer service kami siap membantu Anda 24/7. Jangan ragu untuk menghubungi kami!
                    </p>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon">📱</span>
                            <div>
                                <div style="font-weight: 600; color: #f2e1c7;">WhatsApp</div>
                                <div style="color: rgba(242, 225, 199, 0.8);">+62 812-3456-7890</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <div>
                                <div style="font-weight: 600; color: #f2e1c7;">Email</div>
                                <div style="color: rgba(242, 225, 199, 0.8);">info@jamukita.co.id</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <div>
                                <div style="font-weight: 600; color: #f2e1c7;">Alamat</div>
                                <div style="color: rgba(242, 225, 199, 0.8);">Jl. Jamu Tradisional No. 123, Bekasi, Jawa Barat</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">🕒</span>
                            <div>
                                <div style="font-weight: 600; color: #f2e1c7;">Jam Operasional</div>
                                <div style="color: rgba(242, 225, 199, 0.8);">Senin - Minggu: 08:00 - 22:00 WIB</div>
                            </div>
                        </div>
                    </div>
                `;
            } else if (text === "Beranda") {
                titleContent = `<h2>Selamat Datang di Jamu Kita</h2>`;
                bodyContent = `
                    <p class="modal-description">
                        Platform digital terpercaya untuk jamu tradisional Indonesia. 
                        Nikmati khasiat jamu warisan nenek moyang dengan kemudahan berbelanja online.
                    </p>
                    <div class="feature-grid">
                        <div class="feature-card">
                            <span class="feature-icon">🍃</span>
                            <div class="feature-title">Resep Turun Temurun</div>
                            <div class="feature-text">Formula asli warisan nenek moyang</div>
                        </div>
                        <div class="feature-card">
                            <span class="feature-icon">🚚</span>
                            <div class="feature-title">Pengiriman Cepat</div>
                            <div class="feature-text">Dikirim fresh langsung ke rumah</div>
                        </div>
                    </div>
                `;
            }

            modalTitle.innerHTML = titleContent;
            modalBody.innerHTML = bodyContent;

            modal.style.display = "flex";
            setTimeout(() => modal.classList.add("show"), 10);

            // Close modal button
            const closeBtn = document.querySelector(".close-modal");
            if (closeBtn) {
                closeBtn.addEventListener("click", closeModal);
            }
        });
    });

    function closeModal() {
        modal.classList.remove("show");
        setTimeout(() => {
            modal.style.display = "none";
        }, 300);
    }

    // Close modal when clicking outside
    window.addEventListener("click", function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && modal.style.display === "flex") {
            closeModal();
        }
    });
});

</script>
<!-- <script>document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-item");
    const modal = document.querySelector(".modal");
    const modalContent = document.querySelector(".modal-content");

    menuItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            e.preventDefault(); // Mencegah reload halaman

            const text = this.textContent.trim();

            let content = "";
            if (text === "Tentang Kami") {
                content = "<h2>Tentang Kami</h2><p>Ini adalah informasi tentang kami.</p>";
            } else if (text === "Cara Order") {
                content = "<h2>Cara Order</h2><p>Petunjuk cara memesan produk kami.</p>";
            } else if (text === "Kontak Kami") {
                content = "<h2>Kontak Kami</h2><p>Hubungi kami di nomor berikut: 08123456789.</p>";
            }

            modalContent.innerHTML = `<span class="close-modal">&times;</span>` + content;
            modal.style.display = "flex";

            // Tutup modal saat X diklik
            modalContent.querySelector(".close-modal").addEventListener("click", function () {
                modal.style.display = "none";
            });
        });
    });

    window.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});
</script> -->
</body>
</html>
