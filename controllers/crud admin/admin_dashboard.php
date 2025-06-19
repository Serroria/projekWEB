<?php
// File: admin_dashboard.php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tambahkan Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../../assets/css/adminSidebar.css">
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
                <li><a href="#" >Beranda</a></li>
                <li><a href="../login/logout.php" class="text-sm text-gray-800 hover:underline">Logout</a></li>
            </ul>
        </div>
</nav>
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>

        <!-- Form Tambah Produk -->
        <h2 class="mb-3">Tambah Produk</h2>
        <form action="addProduct.php" method="POST" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Produk" required>
            </div>
            <div class="col-md-6">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Deskripsi Produk" required></textarea>
            </div>
            <div class="col-md-6">
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
            <div class="col-md-6">
                <label for="price" class="form-label">Harga Produk</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Harga Produk" required>
            </div>
            <div class="col-12">
                <button type="submit" name="add_product" class="btn btn-primary">Tambah Produk</button>
            </div>
        </form>

        <hr class="my-5">

        <!-- Daftar Produk -->
        <h2 class="mb-3">Daftar Produk</h2>
        <form action="deleteProduct.php" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data produk
                    $products = $conn->query(
                        "SELECT products.id, products.nama, products.harga, products.gambar, products.deskripsi, categories.nama AS category_name
                        FROM products
                        JOIN categories ON products.category_id = categories.id"
                    );

                    while ($product = $products->fetch_assoc()) {
                        echo "<tr>
                                <td><input type='checkbox' name='delete_ids[]' value='{$product['id']}'></td>
                                <td>{$product['id']}</td>
                                <td>{$product['nama']}</td>
                                <td>{$product['category_name']}</td>
                                <td>" . number_format($product['harga'], 0, '', '.') . "</td>
                                <td>{$product['deskripsi']}</td>
                                <td><img src='../../uploads/{$product['gambar']}' alt='{$product['nama']}' style='width:100px;'></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="delete_selected" class="btn btn-danger">Hapus Produk Terpilih</button>
        </form>
    </div>

    <!-- Tambahkan Script Bootstrap dan Checkbox Select All -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('select_all').addEventListener('click', function(e) {
            const checkboxes = document.querySelectorAll("input[name='delete_ids[]']");
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
        });
    </script>
</body>
</html>