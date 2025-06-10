<!--daftar produk-->
<div class="container-table">
<table class="table-produk">
    <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <tbody>
      

        <tr>
            <td data-th="No"></td>
            <td data-th="Gambar">
                <img src="" alt="" width="60">
            </td>
            <td data-th="Nama"></td>
     

            <td data-th="Desc"></td>
            <td data-th="Kategori"></td>
            <td data-th="Harga">Rp.</td>

            <td data-th="Aksi" >
                <!-- From Uiverse.io by aaronross1 --> 
              <!-- From Uiverse.io by mrhyddenn --> 
              <a href="">>  
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

              
                <form   style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                <input type="hidden" name="id" >
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            </td>


        </tr>
     
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada produk.</td>
        </tr>
      
    </tbody>
</table>

</div>