<!DOCTYPE html>
<html>
<head>
    <title>Cart Page</title>
</head>
<body>
    <h1>Cart Page</h1>
    
    <!-- Include koneksi database -->
    <?php
    include '../../config/koneksi.php';
    ?>

    <!-- Form untuk menambahkan produk ke keranjang -->
    <form action="addOrderan.php" method="POST">
        <input type="number" name="product_id" placeholder="Product ID" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>
    
    <h2>Cart Items:</h2>
    <?php
    // Periksa apakah koneksi berhasil
    if (!isset($conn)) {
        die("Database connection error");
    }

    // Ambil data keranjang
    $cart_items = $conn->query("
        SELECT cart.id AS cart_id, products.nama AS product_name, cart.quantity
        FROM cart
        JOIN products ON cart.product_id = products.id
    ");

    // Tampilkan daftar keranjang
    while ($row = $cart_items->fetch_assoc()) {
        echo "
            <p>
                Product Name: {$row['product_name']}, Quantity: {$row['quantity']}
                <form action='updateOrderan.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='cart_id' value='{$row['cart_id']}'>
                    <input type='number' name='quantity' value='{$row['quantity']}' required>
                    <button type='submit' name='update_cart'>Update</button>
                </form>
                <a href='deleteOrderan.php?delete_cart={$row['cart_id']}'>Delete</a>
            </p>
        ";
    }
    ?>
</body>
</html>
