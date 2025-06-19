<!--daftar produk-->
<div class="container-table">
<form action="../../controllers/crud admin/deleteProduct.php" method="POST">
<table class="table-produk">
    <thead>
    <tr>
       <th><input type="checkbox" id="select_all"></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th> 
        
    </tr>
    </thead>
    <tbody>
    <?php
    // Ambil data produk
    $products = $conn->query(
        "SELECT products.id, products.nama, products.harga, products.gambar, products.deskripsi, categories.nama AS category_name
                FROM products
                JOIN categories ON products.category_id = categories.id"
                    );

                    while ($product = $products->fetch_assoc()) {
                        echo "<tr>
                                <td><input type='checkbox' name='delete_ids[]' value='{$product['id']}'></td>
                                <td>{$product['id']}</td>
                                <td>{$product['nama']}</td>
                                <td>{$product['category_name']}</td>
                                <td>" . number_format($product['harga'], 0, '', '.') . "</td>
                                <td>{$product['deskripsi']}</td>
                                <td><img src='../../uploads/{$product['gambar']}' alt='{$product['nama']}' style='width:100px;'></td>
                              </tr>";
                    }
    ?>

         </tbody>
            </table>
            <button type="submit" name="delete_selected" class="btn btn-danger">Hapus Produk Terpilih</button>
        </form>
    </div>

        </form>
      
    </tbody>
</table>

</div>