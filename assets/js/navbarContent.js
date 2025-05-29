document.addEventListener("DOMContentLoaded", function () {
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
