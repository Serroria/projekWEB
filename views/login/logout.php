<?php
session_start();          // mulai session
session_unset();          // hapus semua session yang ada
session_destroy();        // hancurkan session

header("Location: login.php");  // ke halaman login
exit();
?>
