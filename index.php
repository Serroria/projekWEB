<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website JamuKita</title>
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="stylesheet" href="assets/css/posterSlider.css">
    <link rel="stylesheet" href="assets/css/produk.css">
    <link rel="stylesheet" href="assets/css/navbarHome.css">
</head>
<body>

<div class="navbar">
    <?php include('views/partial/navbar.php');?>
</div>

<div class="posterSlider">
    <?php include('views/partial/posterSlider.php');?>
</div>

<div class="posterSlider">
    <?php include('views/partial/category.php');?>
</div>

<div class="homepage">
    <?php include('views/partial/produk.php'); ?>

</div>
<div class="footer">
    <?php include('views/partial/footer.php'); ?>
</div>

<script src="assets/js/category.js"></script>
<script src="assets/js/posterSlider.js"></script>
<script src="assets/js/produk.js"></script>
<script src="assets/js/navbarHome.js"></script>

</body>
</html>