<?php
require_once '../config/koneksi.php';


$db = new koneksi();
$conn = $db->getConnection();

// Cek apakah koneksi berhasil
if ($conn) {
    echo "Koneksi database berhasil!";
} else {
    echo "Koneksi database gagal!";
}
