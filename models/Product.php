<?php
include '../../config/koneksi.php';

class Product
{
    private $conn;
    private $table = "products";

    public function __construct() {
        $db = new koneksi();
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $sql = "SELECT p.id, p.nama, p.gambar, p.deskripsi, p.harga, p.category_id, c.nama AS kategori 
                FROM " . $this->table . " p
                LEFT JOIN categories c ON p.category_id = c.id
                ORDER BY p.nama ASC";

        $result = $this->conn->query($sql);

        $products = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function create($data) {
    $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " 
        (nama, gambar, deskripsi, category_id, harga) 
        VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssid", 
        $data['nama'], 
        $data['gambar'], 
        $data['deskripsi'], 
        $data['category_id'], 
        $data['harga']);
    return $stmt->execute();
}

public function getById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
    // public function getAll()
    // {
    //     $db = koneksi();
    //     $stmt = $db->query("
    //         SELECT products.*, categories.nama AS category_nama
    //         FROM products
    //         JOIN categories ON products.category_id = categories.id
    //     ");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function create($nama, $deskripsi, $harga, $gambar, $category_id, $stok)
    // {
    //     $db = koneksi();
    //     $stmt = $db->prepare("INSERT INTO products (nama, deskripsi, harga, gambar, category_id, stok) VALUES (?, ?, ?, ?, ?, ?)");
    //     return $stmt->execute([$nama, $deskripsi, $harga, $gambar, $category_id, $stok]);
    // }
}
?>
