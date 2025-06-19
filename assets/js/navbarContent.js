
document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const modal = document.getElementById("modal");
  const modalTitle = document.getElementById("modal-title");
  const modalBody = document.getElementById("modal-body");
  const closeBtn = document.getElementById("closeBtn");

  menuItems.forEach(item => {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      const text = this.textContent.trim();
      let titleContent = "";
      let bodyContent = "";

      if (text === "Tentang Kami") {
        titleContent = "<h2>Tentang Jamu Kita</h2>";
        bodyContent = `
          <p>Jamu Kita adalah platform digital yang menghubungkan tradisi jamu Indonesia dengan teknologi modern.</p>
          <ul>
            <li>🌿 100% Natural</li>
            <li>🏪 Dukung UMKM</li>
            <li>📱 Digital Platform</li>
            <li>✨ Inovasi Modern</li>
          </ul>`;
      } else if (text === "Cara Order") {
        titleContent = "<h2>Cara Memesan</h2>";
        bodyContent = `
          <ol>
            <li>Pilih Produk</li>
            <li>Tambah ke Keranjang</li>
            <li>Checkout & Bayar</li>
            <li>Konfirmasi</li>
            <li>Terima Pesanan</li>
          </ol>`;
      } else if (text === "Kontak Kami") {
        titleContent = "<h2>Hubungi Kami</h2>";
        bodyContent = `
          <p>WhatsApp: +62 812-3456-7890</p>
          <p>Email: info@jamukita.co.id</p>
          <p>Alamat: Jl. Jamu Tradisional No. 123, Bekasi</p>`;
      } else if (text === "Beranda") {
        titleContent = "<h2>Selamat Datang</h2>";
        bodyContent = "<p>Platform digital terpercaya untuk jamu tradisional Indonesia.</p>";
      }

      modalTitle.innerHTML = titleContent;
      modalBody.innerHTML = bodyContent;
      modal.classList.add("show");
    });
  });

  // Close events
  closeBtn.addEventListener("click", () => modal.classList.remove("show"));
  window.addEventListener("click", e => {
    if (e.target === modal) modal.classList.remove("show");
  });
  document.addEventListener("keydown", e => {
    if (e.key === "Escape") modal.classList.remove("show");
  });
});
