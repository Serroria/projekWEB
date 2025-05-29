<?php
require_once 'koneksi.php';

class Category
{
    public function getAll()
    {
        $db = koneksi();
        $stmt = $db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama)
    {
        $db = koneksi();
        $stmt = $db->prepare("INSERT INTO categories (nama) VALUES (?)");
        return $stmt->execute([$nama]);
    }
}
?>
