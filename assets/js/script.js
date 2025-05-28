let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", ()=> {
    sidebar.classList.toggle("open");
    menuBtnChange();
})

function menuBtnChange(){
    if (sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");

    }else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

menuBtnChange();

// Data produk dan pesanan
        const products = [
            { id: 1, name: "Produk 1", category: "Kategori 1", stock: 10 },
            { id: 2, name: "Produk 2", category: "Kategori 2", stock: 20 }
        ];

        const orders = [
            { id: 1, customer: "Pelanggan 1", date: "2023-01-01", total: 100000, status: "Selesai" },
            { id: 2, customer: "Pelanggan 2", date: "2023-01-02", total: 200000, status: "Proses" }
        ];

        // Fungsi menampilkan konten yang dipilih
        function showContent(contentId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(contentId).classList.add('active');
        }

        // Fungsi untuk memuat data produk
        function loadProducts() {
            const productList = document.getElementById('productList');
            productList.innerHTML = '';

            products.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.category}</td>
                    <td>${product.stock}</td>
                `;
                productList.appendChild(row);
            });
        }

        // Fungsi untuk memuat data pesanan
        function loadOrders() {
            const orderList = document.getElementById('orderList');
            orderList.innerHTML = '';

            orders.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.id}</td>
                    <td>${order.customer}</td>
                    <td>${order.date}</td>
                    <td>Rp ${order.total.toLocaleString()}</td>
                    <td>${order.status}</td>
                `;
                orderList.appendChild(row);
            });
        }

        // Event listener untuk form tambah produk
        document.getElementById('addProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ambil nilai input
            const name = this[0].value;
            const category = this[1].value;
            const stock = this[2].value;

            // Validasi sederhana
            if (name && category && stock) {
                // Tambahkan produk baru ke array
                products.push({
                    id: products.length + 1,
                    name: name,
                    category: category,
                    stock: stock
                });

                // Muat ulang data produk
                loadProducts();

                // Kosongkan form
                this.reset();
            }
        });

        // Jalankan fungsi loadProducts dan loadOrders saat pertama kali
        loadProducts();
        loadOrders();