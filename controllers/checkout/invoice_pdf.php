<?php
require_once '../../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

session_start();
$session_id = session_id();
$transaction_id = $_GET['transaction_id'];

$transaction_query = $conn->prepare("SELECT * FROM transactions WHERE id = ?");
$transaction_query->bind_param('i', $transaction_id);
$transaction_query->execute();
$transaction_result = $transaction_query->get_result();
$transaction = $transaction_result->fetch_assoc();

$cart_items_query = $conn->prepare("
    SELECT carts.id AS cart_id, products.nama, products.harga, carts.quantity, 
           (products.harga * carts.quantity) AS total, products.gambar
    FROM carts
    JOIN products ON carts.product_id = products.id
    WHERE carts.session_id = ?
");
$cart_items_query->bind_param('s', $session_id);
$cart_items_query->execute();
$cart_items_result = $cart_items_query->get_result();

$html = '
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .total { font-weight: bold; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Invoice Pembayaran</h1>
    <p><strong>Nomor Transaksi:</strong> ' . $transaction['id'] . '</p>
    <p><strong>Tanggal Transaksi:</strong> ' . $transaction['transaction_date'] . '</p>
    <p><strong>Status Pembayaran:</strong> ' . ($transaction['payment_amount'] >= $transaction['total_amount'] ? 'Pembayaran Sukses' : 'Pembayaran Gagal') . '</p>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>';

$total_price = 0;
while ($item = $cart_items_result->fetch_assoc()) {
    $total_price += $item['total'];
    $html .= "
        <tr>
            <td>{$item['nama']}</td>
            <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
            <td>{$item['quantity']}</td>
            <td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>
        </tr>";
}

$html .= '
            <tr>
                <td colspan="3" class="text-right total">Total Pembelian:</td>
                <td class="total">Rp ' . number_format($total_price, 0, ',', '.') . '</td>
            </tr>
        </tbody>
    </table>
</body>
</html>';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("invoice_" . $transaction['id'] . ".pdf", array("Attachment" => 1));
exit;
?>
