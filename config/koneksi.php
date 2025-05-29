<?php
function koneksi()
{
    $host = 'localhost';
    $db = 'db_jamuKita';
    $user = 'root';
    $pass = '';

    // Ganti $user di parameter keempat dengan $db
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function CloseCon($conn) {
    $conn->close();
}
?>
