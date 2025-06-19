<?php
class koneksi {
    private  $host = 'localhost';
    private $db = 'db_jamukita';
    private $user = 'root';
    private $pass = '';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
         if ($this->conn->connect_error) {
        die("connection failed: " . $this->conn->connect_error);
    }

    $this->conn->set_charset("utf8");
    }

      public function getConnection() {
        return $this->conn;
    }

// }
// function koneksi()
// {
//     $host = 'localhost';
//     $db = 'db_jamuKita';
//     $user = 'root';
//     $pass = '';

//     // Ganti $user di parameter keempat dengan $db
//     $conn = new mysqli($host, $user, $pass, $db);
//     if ($conn->connect_error) {
//         die("connection failed: " . $conn->connect_error);
//     }
//     return $conn;
// }

// function CloseCon($conn) {
//     $conn->close();
}
?>
