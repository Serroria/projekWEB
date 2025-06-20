<?php
include_once __DIR__ . '/../../config/koneksi.php';
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
<?php
$base_url = dirname($_SERVER['SCRIPT_NAME']);
?>

<div class="container">
  <div class="product-list">
    <?php foreach ($products as $product): ?>
      <div class="product-card" data-category="<?= htmlspecialchars($product['kategori']) ?>">
        <img src="<?= $base_url ?>/uploads/<?= htmlspecialchars($product['gambar']) ?>" alt="<?= htmlspecialchars($product['nama']) ?>">

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
           <form action="<?= $base_url ?>/controllers/add%20to%20cart/addOrderan.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" name="add_to_cart" class="buy-btn">Checkout</button>
                                </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>