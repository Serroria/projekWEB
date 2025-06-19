<?php 
include '../../models/Product.php';
$product = new product();

$dataEdit = null;
if (isset($_GET['edit_id'])) {
    $dataEdit = $product->getById($_GET['edit_id']);
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
            <link rel="stylesheet" href="../../assets/css/admin.css">
            <link rel="stylesheet" href="../../assets/css/adminSidebar.css">
             <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>

    <!--sidebar-->
     <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">JamuKita Admin</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            
            <li>
                <a href="#" onclick="showContent('products')">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Produk</span>
                </a>
                <span class="tooltip">Product</span>
            </li>
               <!-- <li>
                <a href="#" onclick="showContent('orders')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li> -->
            
            <li class="profile">
                <div class="profile-details">
                    <img src="iconLogo.png" alt="profileImg">
                    <div class="name_job">
                        <div class="name">JamuKita</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
               
                <a  class='bx bx-log-out' id="log_out" href="../login/logout.php" onclick="return confirm('Yakin mau logout?')"> <i class='bx bx-log-out' id="log_out" ></i></a>

            </li>
        </ul>
    </div>

    <!--form produk-->
    <div class="content">
        <h2><?php echo $dataEdit ? 'Edit Produk': 'Tambah Produk'; ?></h2>
    <form class="form-produk" action="../../models/simpanProducts.php" method="POST" enctype="multipart/form-data">
    <?php if ($dataEdit): ?>
        <input type="hidden" name="id" value="<?= $dataEdit['id']?>"
    <?php endif; ?>
    
    <div>
        <label class="form-label">Nama Produk Tes:</label><br>
        <input type="text" name="nama" value="<?= $dataEdit['nama'] ?? '' ?>" required>
    </div>

    
    <div>
        <label class="form-label">Gambar Produk:</label><br>
       <input type="file" name="gambar" value="<?= $dataEdit['gambar'] ?? '' ?> >

    </div>
    <div>
        
        <label class="form-label"><br>Deskripsi Produk:</label><br>
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
    <button class="btn-form" type="submit">Add</button>
</form>
<?php 
include 'daftarProduct.php';
?>


</div>

<!--daftarporduk-->


</div>
<script src="../../assets/js/adminSidebar.js"></script>

    </body>
    </html>
    