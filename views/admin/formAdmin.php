<? 
include '../../Product.php';

$product = new product();

$dataEdit = null;
if (isset($_GET['edit_id'])) {
    $dataEdit = $product->getById($_GET['edit_id']);
}

?>

<h2><?php echo $dataEdit ? 'Edit Produk': 'Tambah Produk'; ?></h2>
<form action="../../simpanProduct.php" method="POST" enctype="multipart/form-data">
    
</form>