<?php
include '../config/koneksi.php';


class Category
{
  private $conn;
  private $categories = 'categories';

  public function __construct() {
    $db = new koneksi();
    $this->conn = $db->getConnection();
  }

  public function getAll() {
        $sql = "SELECT id, nama FROM " . $this->categories . " ORDER BY nama ASC";
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
