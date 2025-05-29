<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <img src="iconLogo.png" alt="logoJamuKita"></a>
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
            </ul>
        </div>
</nav>

  <div class="img-slider" style="height: 300px;">
        <div class="slide slider-active">
            <img src='../../assets/images/tesiklan.jpg' alt="Poster 1" class="active" style="height: 300px;">
            <div class="info">
                <h2>JamuKita</h2>
                <h3 class='text-white'><b>Kesehatan Alami, Pilihan Tradisi</b></h3>
                <p>Temukan racikan jamu terbaik untuk menjaga vitalitas tubuh Anda. Sehat alami, lebih berenergi!</p>
            </div>
        </div>
        <div class="slide">
           <img src='../../assets/images/tesiklan.jpg' alt="Poster 1">
            <div class="info">
                <h2 class='text-white'>Fokus pada Khasiat</h2>
                <h3 class='text-white'><b>Jaga Daya Tahan Tubuh dengan Jamukita</b></h3>
                <p>Kembalikan energi dan daya tahan tubuh secara alami. Pilih jamu terbaik dari Jamukita.</p>
            </div>
        </div>
        <div class="slide">
            <img src='../../assets/images/tesiklan.jpg' alt="">
            <div class="info">
                <h2 class='text-white'>Gaya Hidup Sehat</h2>
                <h3 class='text-white'><b>Nikmati Hidup Sehat Setiap Hari</b></h3>
                <p>Minum jamu, rasakan manfaatnya. Mulai perjalanan sehat Anda bersama Jamukita.</p>
            </div>
        </div>
        <div class="slide">
            <img src='../../assets/images/tesiklan.jpg' alt="">
            <div class="info">
                <h2 class='text-white'>Sehat Alami, Pilih JamuKita</h2>
                <h3 class='text-white'><b>Segarkan Tubuh, Dukung Imunitas - Mulai Belanja Sekarang!</b></h3>
                <p>Mulai perjalanansehat Anda dengan jamu berkualitas dari JamuKita!</p>
            </div>
        </div>
        <div class="navigation">
            <div class="btn slider-active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </div>

    <?php 
    include('homepage.php')
    ?>

 <!-- Modal Pop-up -->
  <div class="modal" >
    <div class="modal-content ">
      <!-- Konten dari JS akan muncul di sini -->
    </div>
  </div>

    <?php include('footer.php'); ?>

<script src='../../assets/js/navbarHome.js'></script>
<script src='../../assets/js/posterSlide.js'></script>
<script>document.addEventListener("DOMContentLoaded", function () {
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
</script>
</body>
</html>
