<?php
include '../config/koneksi.php';
$conn = koneksi();
if ($conn instanceof mysqli) {
    echo "Connected Successfully using MySQLi";
} else {
    echo "Unexpected connection type.";
}
CloseCon($conn);
?>
