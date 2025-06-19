<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website JamuKita</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/category.css">
    <link rel="stylesheet" href="../../assets/css/posterSlider.css">
    <link rel="stylesheet" href="../../assets/css/homepage.css">
</head>
<body>

<div class="navbar">
    <?php include('../partial/navbar.php');?>
</div>

<div class="posterSlider">
    <?php include('../partial/posterSlider.php');?>
</div>

<div class="posterSlider">
    <?php include('../partial/category.php');?>
</div>

<div class="homepage">
    <?php include('../partial/homepage.php'); ?>

</div>
<div class="footer">
    <?php include('../partial/footer.php'); ?>
</div>

<script src="../../assets/js/category.js"></script>
<script src="../../assets/js/posterSlider.js"></script>
    
</body>
</html>