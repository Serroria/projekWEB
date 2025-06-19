<?php
include_once '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

$sql = "SELECT p.id, p.nama, p.gambar, p.deskripsi, p.harga, c.nama AS kategori
        FROM products p
        JOIN categories c ON p.category_id = c.id";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
</head>
<body>
<div class="container">
  <div class="product-list">
    <?php foreach ($products as $product): ?>
      <div class="product-card" data-category="<?= htmlspecialchars($product['kategori']) ?>">
        <img src="../../uploads/<?= htmlspecialchars($product['gambar']) ?>" alt="<?= htmlspecialchars($product['nama']) ?>">

        <h3 onclick="toggleDesc(<?= $product['id'] ?>)">
          <?= htmlspecialchars($product['nama']) ?>
          <span id="arrowIcon-<?= $product['id'] ?>" class="arrow-icon">▼</span>
        </h3>

        <div id="descBox-<?= $product['id'] ?>" class="descBox">
          <p><?= htmlspecialchars($product['deskripsi']) ?></p>
        </div>

        <p><strong>Kategori:</strong> <?= htmlspecialchars($product['kategori']) ?></p>
        <p><strong>Harga:</strong> Rp. <?= number_format($product['harga'], 0, ',', '.') ?></p>

        <div class="button-row">
          <button onclick="toggleCheckout()" class="buy-btn">Checkout</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>