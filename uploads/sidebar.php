<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!--Sidebar-->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">constGenius</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#" onclick="showContent('dashboard')">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#" onclick="showContent('user')">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#" onclick="showContent('products')">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Produk</span>
                </a>
                <span class="tooltip">Product</span>
            </li>
            <li>
                <a href="#" onclick="showContent('financial')">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#" onclick="showContent('orders')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#" onclick="showContent('settings')">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="./images/profile.png" alt="profileImg">
                    <div class="name_job">
                        <div class="name">const Genius</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>

    <!--Main content-->
    <div class="content">
        <!--Dashboard-->
        <div id="dashboard" class="content-section active">
            <h3>Dashboard</h3>
            <div class="grid">
                <div class="card">
                    <h4>Overview</h4>
                    <p>Selamat datang di Dashboard</p>
                </div>
            </div>
        </div>

        <!--Manajemen Produk-->
        <div id="products" class="content-section">
            <h3>Manajemen Produk</h3>
            <div class="grid">
                <div class="card">
                    <h4>Produk</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody id="productList">
                            <!-- Data akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
                <div class="card">
                    <h4>Tambah Produk</h4>
                    <form id="addProductForm">
                        <input type="text" placeholder="Nama Produk">
                        <input type="text" placeholder="Kategori">
                        <input type="number" placeholder="Stok">
                        <button type="submit">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>

        <!--Laporan Keuangan-->
        <div id="financial" class="content-section">
            <h3>Laporan Keuangan</h3>
            <div class="grid">
                <div class="card">
                    <h4>Pendapatan</h4>
                    <p>Total Pendapatan: Rp 10.000.000</p>
                </div>
                <div class="card">
                    <h4>Pengeluaran</h4>
                    <p>Total Pengeluaran: Rp 5.000.000</p>
                </div>
                <div class="card">
                    <h4>Profit</h4>
                    <p>Profit: Rp 5.000.000</p>
                </div>
            </div>
        </div>

        <!--Pesanan-->
        <div id="orders" class="content-section">
            <h3>Pesanan</h3>
            <div class="grid">
                <div class="card">
                    <h4>Daftar Pesanan</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="orderList">
                            <!-- Data akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--Settings-->
        <div id="settings" class="content-section">
            <h3>Settings</h3>
            <div class="grid">
                <div class="card">
                    <h4>System Settings</h4>
                    <p>Configure system settings here</p>
                </div>
            </div>
        </div>
    </div>
    </section>


</body>

</html>