<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();
?>
<div class="navbar">
    <?php include('../../views/partial/navbar.php'); ?>
</div>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="../../assets/css/cart.css">
    <link rel="stylesheet" href="../../assets/css/navbarHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>Keranjang Belanja</h1>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th> <!-- Tambahan kolom -->
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                if ($result->num_rows > 0) {
                    $total_price = 0;
                    while ($item = $result->fetch_assoc()) {
                        $total_price += $item['total'];
                        echo "<tr>
                            <td><img src='../../uploads/{$item['gambar']}' alt='{$item['nama']}' style='width: 80px; height: auto;'></td>
                            <td>{$item['nama']}</td>
                            <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                            <td>
                                <form action='updateQuantity.php' method='post'>
                                    <div class='input-group'>
                                        <button type='submit' name='action' value='decrease' class='btn btn-secondary btn-sm'>-</button>
                                        <input type='number' name='quantity' value='{$item['quantity']}' class='form-control' style='width: 60px; text-align: center;' readonly>
                                        <button type='submit' name='action' value='increase' class='btn btn-secondary btn-sm'>+</button>
                                    </div>
                                    <input type='hidden' name='cart_id' value='{$item['cart_id']}'>
                                </form>
                            </td>
                            <td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>
                            <td>
                                <a href='deleteOrderan.php?cart_id={$item['cart_id']}' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    echo "<tr><td colspan='6' class='text-end'><strong>Total Pembelian: Rp " . number_format($total_price, 0, ',', '.') . "</strong></td></tr>";
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Keranjang belanja kosong.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="katalog.php" class="btn btn-primary">Lanjut Belanja</a>
        <a href="../checkout/payment_page.php" class="btn btn-success">Checkout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/cart.js"></script>

    <footer class="text-center mt-5">
        <p>&copy; 2025 Jamu Kita. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
