<?php 
include '../../models/Product.php';
$product = new product();

$dataEdit = null;
if (isset($_GET['edit_id'])) {
    $dataEdit = $product->getById($_GET['edit_id']);
}
?>
    
    <h2><?php echo $dataEdit ? 'Edit Produk': 'Tambah Produk'; ?></h2>
    <form class="form-produk" action="../../models/simpanProducts.php" method="POST" enctype="multipart/form-data">
    <?php if ($dataEdit): ?>
        <input type="hidden" name="id" value="<?= $dataEdit['id']?>"
    <?php endif; ?>
    
    <div>
        <label class="form-label">Nama Produk:</label><br>
        <input type="text" name="nama" value="<?= $dataEdit['nama'] ?? '' ?>" required>
    </div>

    <div>
        <label class="form-label">Gambar Produk:</label><br>
       <input type="file" name="gambar" value="<?= $dataEdit['gambar'] ?? '' ?> >

    </div>

    <div>
        <label class="form-label">Deskripsi Produk:</label><br>
       <textarea name="deskripsi" <?= $dataEdit['deskripsi'] ?? '' ?> ></textarea>


    </div>

    <div>
        <label class="form-label">Kategori Produk:</label><br>
        <select name="category_id" class="form-control" required>
            <?php 
            $conn = (new koneksi())->getConnection();
            $categories = $conn->query("SELECT * FROM categories");
            while ($cat= $categories->fetch_assoc()):
            ?>
            <option value="<?=$cat['id'] ?> " <?=isset($dataEdit) && $dataEdit['category_id'] == $cat['id'] ? 'selected' : '' ?> > <?= $cat['nama'] ?></option>
           
    
               
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div>
        <label class="form-label">Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="<? $dataEdit['harga'] ?? '' ?>" required>
    </div>



    <button class="btn-form" type="submit">Tambah Produk</button>
</form>


</div>

