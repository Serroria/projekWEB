<?php
require_once '../config/koneksi.php';


class Category
{
  private $conn;
  private $table_name = 'categories';

  public function __construct() {
    $database = new koneksi();
    $this->conn = $database->getConnection();
  }

  public function getAll() {
        $sql = "SELECT id, nama FROM " . $this->table_name . " ORDER BY nama ASC";
        $result = $this->conn->query($sql);

        $categories = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }
        return $categories;
    }
}
?>
