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

    <form class="form-produk" action="{{ route($editProduct ? 'products.update' : 'products.store', $editProduct ? $editProduct->id : '') }}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($editProduct)
        @method('PUT')
    @endif
    <div>
        <label class="form-label">Nama Produk:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $editProduct->nama ?? '') }}" required>
    </div>

    <div>
        <label class="form-label">Gambar Produk:</label><br>
       <input type="file" name="gambar" {{ $editProduct ? '' : 'required' }}>

    </div>

    <div>
        <label class="form-label">Deskripsi Produk:</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $editProduct->deskripsi ?? '') }}</textarea>
    </div>

    <div>
        <label class="form-label">Kategori Produk:</label><br>
        <select name="category_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $editProduct->category_id ??'') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
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
        @forelse($products as $product)

        <tr>
            <td data-th="No">{{ $loop->iteration }}</td>
            <td data-th="Gambar">
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" width="60">
            </td>
            <td data-th="Nama">{{ $product->nama}}</td>
            {{-- <td data-th="Stok">{{ $product->stok }}</td> --}}

            <td data-th="Desc">{{ Str::limit($product->deskripsi, 50)}}</td>
            <td data-th="Kategori">{{$product->category->nama??'-' }}</td>
            <td data-th="Harga">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>

            <td data-th="Aksi" >
                <!-- From Uiverse.io by aaronross1 --> 
              <!-- From Uiverse.io by mrhyddenn --> 
              <a href="{{ route('admin', $product->id) }}">  
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
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            </td>


        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada produk.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>

<!-- Tambahkan pagination di sini -->
<div style="margin-top: 20px;">
    {{ $products->links() }}
</div>

<script src='../../assets/js/admin.js'></script>
</body>
</html>