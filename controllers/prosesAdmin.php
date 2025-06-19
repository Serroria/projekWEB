<?php
class Product {
    private $conn;
    private $table = 'products';

    // Kolom tabel
    public $id;
    public $nama;
    public $deskripsi;
    public $harga;
    public $gambar;
    public $category_id;
    public $stok;
    public $created_at;
    public $updated_at;

    // Constructor dengan koneksi database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method untuk mendapatkan semua produk
    public function getAll() {
        $query = "SELECT p.*, c.nama as category_name 
                  FROM {$this->table} p
                  LEFT JOIN categories c ON p.category_id = c.id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // Method untuk mendapatkan produk berdasarkan ID
    public function getById($id) {
        $query = "SELECT p.*, c.nama as category_name 
                  FROM {$this->table} p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.id = ? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        return $stmt;
    }

    // Method untuk membuat produk baru
    public function create() {
        $query = "INSERT INTO {$this->table} 
                  SET nama = :nama, deskripsi = :deskripsi, harga = :harga, 
                      gambar = :gambar, category_id = :category_id, stok = :stok";
        
        $stmt = $this->conn->prepare($query);
        
        // Bersihkan data
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->gambar = htmlspecialchars(strip_tags($this->gambar));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->stok = htmlspecialchars(strip_tags($this->stok));
        
        // Bind parameter
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':gambar', $this->gambar);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':stok', $this->stok);
        
        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Method untuk update produk
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET nama = :nama, deskripsi = :deskripsi, harga = :harga, 
                      gambar = :gambar, category_id = :category_id, stok = :stok
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Bersihkan data
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->gambar = htmlspecialchars(strip_tags($this->gambar));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->stok = htmlspecialchars(strip_tags($this->stok));
        $this->id = htmlspecialchars(strip_tags($this->id));
        
        // Bind parameter
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':gambar', $this->gambar);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':stok', $this->stok);
        $stmt->bindParam(':id', $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Method untuk menghapus produk
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }
}