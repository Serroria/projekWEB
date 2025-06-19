<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Keranjang Belanja</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
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
                    (products.harga * carts.quantity) AS total
                    FROM carts
                    JOIN products ON carts.product_id = products.id
                    WHERE carts.session_id = ?
                ");
                $cart_items->bind_param('s', $session_id);
                $cart_items->execute();

                $result = $cart_items->get_result();

                if ($result->num_rows > 0) {
                    while ($item = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$item['nama']}</td>
                            <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                            <td>{$item['quantity']}</td>
                            <td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>
                            <td>
                                <a href='deleteOrderan.php?cart_id={$item['cart_id']}' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Keranjang belanja kosong.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="katalog.php" class="btn btn-primary">Lanjut Belanja</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
