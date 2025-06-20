<?php
include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

// Mulai sesi untuk mendapatkan session_id
session_start();
$session_id = session_id();

// Ambil data dari form
$payment_amount = $_POST['payment_amount'];
$total_amount = $_POST['total_amount'];

// Validasi: Jika pembayaran kurang dari total, tampilkan pesan error dan kembali
if ($payment_amount < $total_amount) {
    echo "<script>
        alert('Jumlah pembayaran kurang dari total pembelian!');
        window.history.back(); // Kembali ke halaman sebelumnya
    </script>";
    exit;
}

// Simpan transaksi
$transaction_query = $conn->prepare("
    INSERT INTO transactions (session_id, total_amount, payment_amount, transaction_date)
    VALUES (?, ?, ?, NOW())
");
$transaction_query->bind_param('sdd', $session_id, $total_amount, $payment_amount);
$transaction_query->execute();

// Ambil ID transaksi yang baru
$transaction_id = $conn->insert_id;

// Redirect ke invoice
header("Location: invoice.php?transaction_id=" . $transaction_id);
exit;
?>
