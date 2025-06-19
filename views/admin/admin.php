<?php
// File: admin_dashboard.php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
            <link rel="stylesheet" href="../../assets/css/admin.css">
            <link rel="stylesheet" href="../../assets/css/adminSidebar.css">
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
             <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>

    <!--navbar-->
<nav class="navbar">
        <div class="navbar-container">
            <!--logo-->
            <a href="#" class="navbar-logo">
                <img src="../../assets/images/iconLogo.png" alt="logoJamuKita">
            </a>
            <button class="navbar-toggle">  
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <ul class="navbar-menu">
                <li><a href="../login/logout.php" class="text-sm text-gray-800 hover:underline">Logout</a></li>
            </ul>
        </div>
</nav>
        <div class="content">
            <h1>Dashboard Admin</h1>
       
        <!-- Form Tambah Produk -->
        <h2 class="mb-3">Tambah Produk</h2>
    <form action="../../controllers/crud admin/addProduct.php" method="POST" enctype="multipart/form-data" class="row g-3">
               <div>
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Produk" required>
            </div>
            <div>
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg, .jpeg, .png" required>
            </div>
            <div>
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Deskripsi Produk" required></textarea>
            </div>
            <div  class="col-md-6">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php
                    // Ambil data kategori
                    $categories = $conn->query("SELECT * FROM categories");
                    while ($category = $categories->fetch_assoc()) {
                        echo "<option value='{$category['id']}'>{$category['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="price" class="form-label">Harga Produk</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Harga Produk" required>
            </div>
            <div>
                <button type="submit" name="add_product" class="btn btn-primary">Tambah Produk</button>
            </div>

</form>

<?php 
include 'daftarProduct.php';
?>
</div>
</div>


<script src="../../assets/js/adminSidebar.js"></script>


    </body>
    </html>
    