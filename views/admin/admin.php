<?php
require_once 'Product.php';
require_once 'Category.php';

$productObj = new Product();
$categoryObj = new Category();

$products = $productObj->getAll();
$categories = $categoryObj->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamuKita Admin</title>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel='stylesheet' href='../../assets/css/admin.css'>
    
</head>
<body>

<!-- sidebar -->
    <div>
         <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">JamuKita Admin</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#" onclick="showContent('dashboard')">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#" onclick="showContent('user')">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#" onclick="showContent('products')">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Produk</span>
                </a>
                <span class="tooltip">Product</span>
            </li>
            <li>
                <a href="#" onclick="showContent('financial')">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#" onclick="showContent('orders')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#" onclick="showContent('settings')">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="iconLogo.png" alt="profileImg">
                    <div class="name_job">
                        <div class="name">JamuKita</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    </div>

    <!-- content mainnya -->

    <form class="form-produk" action="products.php" method="POST" enctype="multipart/form-data">
    <?php if(isset($editProduct)): ?>
        <input type="hidden" name="id" value="<?= $editProduct[id] ?>">
    <?php endif; ?>

    <div>
        <label class="form-label">Nama Produk:</label><br>
        <input type="text" name="nama" value=" <?= htmlspecialchars($editProduct['nama']?? $_POST['nama']?? '')?> required>
    </div>

    <div>
        <label class="form-label">Gambar Produk:</label><br>
       <input type="file" name="gambar" <?= isset ($editProduct) ? '' : 'required' ?>>

    </div>

    <div>
        <label class="form-label">Deskripsi Produk:</label><br>
       <textarea name="deskripsi"><?= htmlspecialchars($editProduct['deskripsi'] ?? $_POST['deskripsi'] ?? '') ?></textarea>


    </div>

    <div>
        <label class="form-label">Kategori Produk:</label><br>
        <select name="category_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" 
               <?= (isset($editProduct) && $editProduct['category_id'] == $category['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['nama']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="form-label">Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="{{ old('harga') }}" required>
    </div>

    {{-- <div> --}}
    {{-- <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok', $editProduct->stok ?? 0) }}" required>
</div> --}}


    <button class="btn-form" type="submit">Tambah Produk</button>
</form>

<!--daftar produk-->
<div class="container-table">
<table class="table-produk">
    <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        {{-- <th>Stok</th> --}}
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <tbody>
        <? if (!empty($products)): ?>
            <?php foreach ($product as $i => $product) : ?>

        <tr>
            <td data-th="No"><?= $i +1?></td>
            <td data-th="Gambar">
                <img src="uploads/<?= $product['gambar'] ?>" alt="<?= htmlspecialchars($product['nama']) ?> width="60">
            </td>
            <td data-th="Nama"><?= htmlspecialchars($product['nama']) ?></td>
            {{-- <td data-th="Stok">{{ $product->stok }}</td> --}}

            <td data-th="Desc"><?= htmlspecialchars(substr($product['deskripsi'], 0, 50)) ?></td>
            <td data-th="Kategori"><?= htmlspecialchars($product['category_nama'] ?? '-') ?></td>
            <td data-th="Harga">Rp<?= number_format($product['harga'], 0, ',', '.') ?></td>

            <td data-th="Aksi" >
                <!-- From Uiverse.io by aaronross1 --> 
              <!-- From Uiverse.io by mrhyddenn --> 
              <a href="edit.php?id=<?= $product['id'] ?>">>  
              <button>
                Edit
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                    fill="currentColor"
                    d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z"
                    ></path>
                </svg>
                </button>
            </a>

                {{-- <a href="{{ route('admin', $product->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                <form action="delete.php" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            </td>


        </tr>
       <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada produk.</td>
        </tr>
         <?php endif; ?>
    </tbody>
</table>

</div>

<!-- Tambahkan pagination di sini
<div style="margin-top: 20px;">
    {{ $products->links() }}
</div> -->

<script src='../../assets/js/admin.js'></script>
</body>
</html>