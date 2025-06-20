<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

$transaction_id = $_GET['transaction_id'] ?? 0;

// Ambil data transaksi
$stmt = $conn->prepare("SELECT * FROM transactions WHERE id = ?");
$stmt->bind_param('i', $transaction_id);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();

if (!$transaction) {
    echo "Transaksi tidak ditemukan.";
    exit;
}

// Ambil item dari keranjang sesuai session
$session_id = $transaction['session_id'];
$items = $conn->prepare("
    SELECT products.nama, products.harga, carts.quantity, 
           (products.harga * carts.quantity) AS total
    FROM carts
    JOIN products ON carts.product_id = products.id
    WHERE carts.session_id = ?
");
$items->bind_param('s', $session_id);
$items->execute();
$item_result = $items->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Invoice Pembayaran</h2>
    <p><strong>ID Transaksi:</strong> <?= $transaction['id']; ?></p>
    <p><strong>Tanggal:</strong> <?= $transaction['transaction_date']; ?></p>
    <p><strong>Total Pembelian:</strong> Rp <?= number_format($transaction['total_amount'], 0, ',', '.'); ?></p>
    <p><strong>Jumlah Dibayar:</strong> Rp <?= number_format($transaction['payment_amount'], 0, ',', '.'); ?></p>
    <p><strong>Kembalian:</strong> Rp <?= number_format($transaction['payment_amount'] - $transaction['total_amount'], 0, ',', '.'); ?></p>

    <hr>
    <h4>Detail Pembelian:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $item_result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?= $row['quantity']; ?></td>
                    <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="katalog.php" class="btn btn-primary">Kembali ke Katalog</a>
    <a href="invoice_pdf.php?transaction_id=<?= $transaction['id']; ?>" class="btn btn-danger" target="_blank">
        Download Invoice (PDF)
    </a>
</div>
</body>
</html>
