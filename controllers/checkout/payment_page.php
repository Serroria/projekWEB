<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();

// Ambil data keranjang belanja
$cart_items = $conn->prepare("
    SELECT carts.id AS cart_id, products.nama, products.harga, carts.quantity, 
           (products.harga * carts.quantity) AS total, products.gambar
    FROM carts
    JOIN products ON carts.product_id = products.id
    WHERE carts.session_id = ?
");
$cart_items->bind_param('s', $session_id);
$cart_items->execute();
$result = $cart_items->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    <link rel="stylesheet" href="../../assets/css/cart.css">
    <link rel="stylesheet" href="../../assets/css/navbarHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Halaman Pembayaran</h1>
        
        <?php if ($result->num_rows > 0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    while ($item = $result->fetch_assoc()) {
                        $total_price += $item['total'];
                        echo "<tr>
                            <td><img src='../../uploads/{$item['gambar']}' alt='{$item['nama']}' style='width: 80px; height: auto;'></td>
                            <td>{$item['nama']}</td>
                            <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                            <td>{$item['quantity']}</td>
                            <td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>
                        </tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total Pembelian: </strong></td>
                        <td><strong>Rp <?php echo number_format($total_price, 0, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>

            <form action="process_payment.php" method="POST">
                <div class="mb-3">
                    <label for="payment_amount" class="form-label">Masukkan Jumlah Pembayaran</label>
                    <input type="number" name="payment_amount" id="payment_amount" class="form-control" required>
                </div>
                <input type="hidden" name="total_amount" value="<?php echo $total_price; ?>">
                <button type="submit" class="btn btn-success">Bayar</button>
            </form>

        <?php } else { ?>
            <p>Keranjang belanja Anda kosong. Silakan kembali ke katalog untuk berbelanja.</p>
            <a href="katalog.php" class="btn btn-primary">Kembali ke Katalog</a>
        <?php } ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
