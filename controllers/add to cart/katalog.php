<!-- <?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM products";
$result = $conn->query($query);
?> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Katalog Produk</h1>
        
        <!-- Tombol Lihat Keranjang -->
        <a href="../add to cart/cart_page.php" class="btn btn-success mb-4">Lihat Keranjang</a>
        
        <!-- Daftar Produk -->
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($product = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="../../uploads/<?php echo htmlspecialchars($product['gambar']); ?>" 
                                class="card-img-top" 
                                alt="<?php echo htmlspecialchars($product['nama']); ?>" 
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['nama']); ?></h5>
                                <p class="card-text">Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($product['deskripsi']); ?></p>
                                <form action="addOrderan.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" name="add_to_cart" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Belum ada produk yang tersedia di katalog.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->
