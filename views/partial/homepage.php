<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../config/koneksi.php';
$db = new koneksi();
$conn = $db->getConnection();

$sql = "SELECT p.id, p.nama, p.gambar, p.deskripsi, p.harga, c.nama AS kategori
        FROM products p
        JOIN categories c ON p.category_id = c.id";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>


<div class="">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    <!-- Kontainer produk flex biar sejajar -->
    <div class="flex flex-wrap gap-6 justify-center">

      <!-- Produk 1 -->
      <div class="max-w-sm product-card bg-white p-4 rounded-lg shadow" data-category="jamuAnak">
        <div class="group block">
          <img src="../../assets/images/buyungupik.jpg" 
               alt="Buyung Upik" 
               class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

          <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc(1)">
            <h3 class="text-sm text-gray-700 font-semibold flex items-center">
              Buyung Upik
              <span id="arrowIcon-1" class="ml-2 transition-transform">▼</span>
            </h3>
          </div>

          <div id="descBox-1" class="hidden mt-2 text-sm text-gray-600">
            Jamu tradisional berbahan dasar kunyit dan asam jawa untuk menyegarkan tubuh dan membantu melancarkan haid.
          </div>

          <h3><strong>Kategori:</strong> Jamu Anak</h3>
          <p><strong>Harga:</strong> Rp. 15.000,00</p>

          <button onclick="toggleCheckout()" class="buy-btn mt-2">Checkout</button>
          <button class="buy-btn mt-2" data-product-id="1" data-product-name="Buyung Upik" data-price="15000">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
        </div>
      </div>

      <!-- Produk 2 -->
      <div class="max-w-sm product-card bg-white p-4 rounded-lg shadow" data-category="jamuHerbal">
        <div class="group block">
          <img src="../../assets/images/jamu-bersalin.png" 
               alt="Jamu Bersalin" 
               class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

          <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc(2)">
            <h3 class="text-sm text-gray-700 font-semibold flex items-center">
              Jamu Bersalin
              <span id="arrowIcon-2" class="ml-2 transition-transform">▼</span>
            </h3>
          </div>

          <div id="descBox-2" class="hidden mt-2 text-sm text-gray-600">
            Jamu tradisional berbahan dasar kunyit dan asam jawa untuk menyegarkan tubuh dan membantu melancarkan haid.
          </div>

          <h3><strong>Kategori:</strong> Jamu Herbal</h3>
          <p><strong>Harga:</strong> Rp. 15.000,00</p>

          <button onclick="toggleCheckout()" class="buy-btn mt-2">Checkout</button>
          <button class="buy-btn mt-2" data-product-id="2" data-product-name="Jamu Bersalin" data-price="15000">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
        </div>
      </div>

    </div> <!-- end flex wrapper -->
  </div>
</div>

        <!-- <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <?php foreach ($products as $product) { ?>
            
            <div class="max-w-sm mx-auto product-card" data-category="<?php echo htmlspecialchars($product['kategori']); ?>">
                <div class="group block">
                    <img src="uploads/<?php echo $product['gambar']; ?>" 
                         alt="<?php echo htmlspecialchars($product['nama']); ?>" 
                         class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    
                    <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc(<?php echo $product['id']; ?>)">
                        <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                             <?php echo htmlspecialchars($product['nama']); ?>
                            <span id="arrowIcon-<?php echo $product['id']; ?>" class="ml-2 transition-transform">▼</span>
                        </h3>
                    </div> -->

                    <!-- Deskripsi -->
                    <!-- <div id="descBox-<?php echo $product['id']; ?>" class="hidden mt-2 text-sm text-gray-600">
                        <?php echo nl2br(htmlspecialchars($product['deskripsi'])); ?>
                    </div>
                    <h3><strong>Kategori:</strong> <?php echo $product['kategori']; ?></h3>

                    <p><strong>Harga:</strong> Rp. <?php echo number_format($product['harga'], 2, ',', '.'); ?></p>

                    <button onclick="toggleCheckout()" class="buy-btn">Checkout</button>

                    <button 
                      class="buy-btn"
                      data-product-id="<?php echo $product['id']; ?>"
                      data-product-name="<?php echo htmlspecialchars($product['nama']); ?>"
                      data-price="<?php echo $product['harga']; ?>"
                    >
                      <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</div> -->

<!-- POP-UP MODAL -->
<!-- <div id="checkoutModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Checkout</h2>
        <div id="cartItems" class="mb-4"></div>
        <p class="font-semibold">Subtotal: <span id="cartSubtotal">Rp0</span></p>
        <p class="font-semibold">Ongkir: Rp4.999</p>
        <hr class="my-2">
        <p class="font-bold text-lg">Total: <span id="totalHarga"></span></p>
        <button class="mt-4 bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded" onclick="toggleCheckout()">Tutup</button>
    </div>
</div> -->

<script>
    function toggleDesc(id) {
        const descBox = document.getElementById('descBox-' + id);
        const arrowIcon = document.getElementById('arrowIcon-' + id);

        if (descBox.classList.contains('hidden')) {
            descBox.classList.remove('hidden');
            arrowIcon.innerHTML = '▲';
        } else {
            descBox.classList.add('hidden');
            arrowIcon.innerHTML = '▼';
        }
    }

    function toggleCheckout() {
        const modal = document.getElementById('checkoutModal');
        modal.classList.toggle('hidden');
    }
</script>
